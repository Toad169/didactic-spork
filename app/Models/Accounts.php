<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    /** @use HasFactory<\Database\Factories\AccountsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'account_number', 'balance', 'status', 'opened_at', 'closed_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactions() {
        return $this->hasMany(Transactions::class);
    }

    public function transfersSent() {
        return $this->hasMany(Transfers::class, 'sender_account_id');
    }

    public function transfersReceived() {
        return $this->hasMany(Transfers::class, 'receiver_account_id');
    }

    public function savings() {
        return $this->hasMany(Savings::class);
    }

}
