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

    public function transactionsFromSource()
    {
        return $this->hasMany(Transaction::class, 'source_id');
    }

    public function transactionsFromDestination()
    {
        return $this->hasMany(Transaction::class, 'destination_id');
    }

    public function transactions()
    {
        return Transaction::where(function ($query) {
            $query->where('source_id', $this->id)
                ->orWhere('destination_id', $this->id);
        });
    }

    public function getBalanceAttribute()
    {
        $entrance = $this->transactions()->where('destination_id', $this->id)->sum('amount');
        $exit = $this->transactions()->where('source_id', $this->id)->sum('amount');
        return $entrance - $exit;
    }

    public function getEntranceBalanceAttribute()
    {
        return $this->transactions()->where('destination_id', $this->id)->sum('amount');
    }

    public function getExitBalanceAttribute()
    {
        return $this->transactions()->where('source_id', $this->id)->sum('amount');
    }
}
