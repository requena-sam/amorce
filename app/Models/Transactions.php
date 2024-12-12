<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionsFactory> */
    use HasFactory;

    protected $fillable = [
        'fund_id',
        'amount',
        'transaction_type',
        'transfer_type',
        'user_id',
        'target',
        'giver_email',
        ];
    public function fund()
    {
        return $this->belongsTo(Fund::class, 'fund_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
