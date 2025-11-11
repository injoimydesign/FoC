<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'base_price',
        'image_url',
        'flag_type',
        'military_branch',
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
            'base_price' => 'decimal:2',
            'active' => 'boolean',
        ];
    }

    /**
     * Get the subscriptions for the flag.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Scope a query to only include active flags.
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to only include US flags.
     */
    public function scopeUsFlag($query)
    {
        return $query->where('flag_type', 'us_flag');
    }

    /**
     * Scope a query to only include military flags.
     */
    public function scopeMilitaryFlag($query)
    {
        return $query->where('flag_type', 'military_flag');
    }

    /**
     * Calculate discounted price based on passed events.
     */
    public function getDiscountedPrice(\DateTime $currentDate = null): float
    {
        if (!$currentDate) {
            $currentDate = new \DateTime();
        }

        $events = FlagEvent::orderBy('date')->get();
        $passedEvents = 0;

        foreach ($events as $event) {
            $eventDate = new \DateTime($event->date);
            if ($eventDate < $currentDate) {
                $passedEvents++;
            }
        }

        // After 2nd event, reduce by 15% for each additional event
        $discountPercent = 0;
        if ($passedEvents > 2) {
            $discountPercent = ($passedEvents - 2) * 15;
        }

        // Cap at 45% discount
        if ($discountPercent > 45) {
            $discountPercent = 45;
        }

        $discountMultiplier = (100 - $discountPercent) / 100;
        return round($this->base_price * $discountMultiplier, 2);
    }
}
