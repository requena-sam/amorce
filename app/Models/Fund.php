<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    /** @use HasFactory<\Database\Factories\FundFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'entrance',
        'exit',
    ];
    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'fund_id');
    }
}
