<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    /** @use HasFactory<\Database\Factories\ProjetFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
    ];

    public function detentes()
{
    return $this->belongsToMany(Detente::class);
}
}
