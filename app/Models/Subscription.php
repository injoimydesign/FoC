<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'flag_id',
        'location_id',
        'stripe_customer_id',
        'stripe_subscription_id',
        'subscription_type',
        'subscription_tier',
        'price',
        'start_date',
        'end_date',
        'active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'start_date' => 'date',
            'end_date' => 'date',
            'active' => 'boolean',
        ];
    }

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the flag for the subscription.
     */
    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }

    /**
     * Get the location for the subscription.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the payments for the subscription.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Scope a query to only include active subscriptions.
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to only include yearly subscriptions.
     */
    public function scopeYearly($query)
    {
        return $query->where('subscription_type', 'yearly');
    }

    /**
     * Scope a query to only include one-time subscriptions.
     */
    public function scopeOneTime($query)
    {
        return $query->where('subscription_type', 'one_time');
    }

    /**
     * Check if subscription is expired.
     */
    public function isExpired(): bool
    {
        if (!$this->end_date) {
            return false;
        }
        return $this->end_date < now();
    }
}
