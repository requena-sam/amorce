<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'source_id',
        'source',
        'destination_id',
        'destination',
        'amount',
        'transaction_type',
        'transfer_type',
        'user_id',
        'target',
        'donator',
        'donator_email',
        ];
    public function sourceFund()
    {
        return $this->belongsTo(Fund::class, 'source_id');
    }

    public function destinationFund()
    {
        return $this->belongsTo(Fund::class, 'destination_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
