<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendancesFactory> */

    use HasFactory;

    protected $fillable = [
        'donator_id',
        'detente_id',
        'disponibility'
    ];

    public function donator()
    {
        return $this->belongsTo(Donator::class);
    }

    public function detente()
    {
        return $this->belongsTo(Detente::class);
    }


}
