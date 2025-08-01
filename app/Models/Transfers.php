<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{
    /** @use HasFactory<\Database\Factories\TransfersFactory> */
    use HasFactory;

    protected $fillable = [
        'sender_account_id', 'receiver_account_id', 'amount', 'description', 'status'
    ];

    public function sender() {
        return $this->belongsTo(Accounts::class, 'sender_account_id');
    }

    public function receiver() {
        return $this->belongsTo(Accounts::class, 'receiver_account_id');
    }
}
