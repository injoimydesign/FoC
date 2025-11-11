<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'subscription_id',
        'stripe_payment_intent_id',
        'stripe_session_id',
        'amount',
        'processing_fee',
        'status',
        'payment_type',
        'metadata',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'processing_fee' => 'decimal:2',
            'metadata' => 'array',
        ];
    }

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subscription for the payment.
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Scope a query to only include completed payments.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope a query to only include pending payments.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include failed payments.
     */
    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    /**
     * Calculate Stripe processing fee.
     */
    public static function calculateProcessingFee(float $amount): float
    {
        $stripeFeePercent = 0.029; // 2.9%
        $stripeFeeFixed = 0.30;    // $0.30
        
        $fee = ($amount + $stripeFeeFixed) / (1 - $stripeFeePercent) - $amount;
        return round($fee, 2);
    }

    /**
     * Get total amount including processing fee.
     */
    public function getTotalAmountAttribute(): float
    {
        return $this->amount + $this->processing_fee;
    }
}
