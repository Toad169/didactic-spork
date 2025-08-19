<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'account_id',
        'related_transaction_id',
        'transaction_type',
        'amount',
        'description',
        'status',
        'transaction_date',
    ];
}
