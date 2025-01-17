<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Donator extends Model
{
    use HasFactory;

    protected $casts = [
        'donations_dates' => 'array',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'donations_dates',
        'is_drawable',
        'count_detente',
        'disponibility',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function detentes()
    {
        return $this->belongsToMany(Detente::class, Attendance::class)
            ->withTimestamps();
    }

    public function isDrawable(): bool
    {
        $threeMonthsAgo = Carbon::now()->subMonths(3);
        $currentYear = Carbon::now()->year;

        $hasRecentDonations = collect($this->donations_dates)
            ->contains(function ($date) use ($threeMonthsAgo) {
                return Carbon::parse($date)->greaterThanOrEqualTo($threeMonthsAgo);
            });

        $lastDetenteYear = $this->last_detente ? Carbon::parse($this->last_detente)->year : null;
        $hasParticipatedThisYear = $lastDetenteYear === $currentYear;

        $isDrawable = $hasRecentDonations && !$hasParticipatedThisYear && $this->hasConsecutiveMonths();
        $this->is_drawable = $isDrawable;
        $this->save();

        return $isDrawable;
    }

    public function hasConsecutiveMonths(): bool
    {
        $dates = collect($this->donations_dates)->map(function ($date) {
            return Carbon::parse($date);
        })->sort();

        for ($i = 1; $i < $dates->count(); $i++) {
            if (!$dates[$i]->isSameMonth($dates[$i - 1]->copy()->addMonth())) {
                return false;
            }
        }

        return true;
    }

    public static function updateDrawableStatusForAll()
    {
        $donators = self::all();
        foreach ($donators as $donator) {
            $donator->is_drawable = $donator->isDrawable();
            $donator->save();
        }
    }
}
