<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'transaction_type',
        'amount',
        'description',
        'transaction_date',
    ];

    protected $guarded = [
        'user_id',
        'account_id',
        'contract_id',
        'related_transaction_id',
        'status',
    ];

    protected $hidden = [
        'user_id',
        'account_id',
        'contract_id',
        'related_transaction_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
