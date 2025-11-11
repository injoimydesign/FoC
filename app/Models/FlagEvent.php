<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlagEvent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date',
        'description',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    /**
     * Scope a query to only include upcoming events.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>', now())->orderBy('date');
    }

    /**
     * Scope a query to only include past events.
     */
    public function scopePast($query)
    {
        return $query->where('date', '<', now())->orderBy('date', 'desc');
    }

    /**
     * Get the next upcoming event.
     */
    public static function getNextEvent()
    {
        return self::upcoming()->first();
    }

    /**
     * Get upcoming events limited by count.
     */
    public static function getUpcomingEvents(int $count = 3)
    {
        return self::upcoming()->limit($count)->get();
    }
}
