<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detente extends Model
{
    /** @use HasFactory<\Database\Factories\DetenteFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }

    public function donators()
    {
        return $this->belongsToMany(Donator::class, Attendance::class)
            ->withTimestamps();
    }


}
