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

    public function getBalanceAttribute()
    {
        $entrance = $this->transactions()->where('transaction_type', 'Dépot')->sum('amount');
        $exit = $this->transactions()->where('transaction_type', 'Retrait')->sum('amount');
        return $entrance - $exit;
    }

    public function getEntranceBalanceAttribute()
    {
        return $this->transactions()->where('transaction_type', 'Dépot')->sum('amount');
    }

    public function getExitBalanceAttribute()
    {
        return $this->transactions()->where('transaction_type', 'Retrait')->sum('amount');
    }
}
