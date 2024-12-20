<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donator extends Model

{
    /** @use HasFactory<\Database\Factories\DonatorFactory> */
    use HasFactory;

    protected $casts = [
        'donations_dates' => 'json',
    ];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'donations_dates'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function detentes()
    {
        return $this->belongsToMany(Detente::class, Attendance::class)
            ->withPivot('disponibility')
            ->withTimestamps();
    }


}
