<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionsFactory> */
    use HasFactory;

    protected $fillable = [
        'account_id', 'type', 'amount', 'description', 'sharia_basis', 'status', 'performed_by'
    ];

    public function account() {
        return $this->belongsTo(Accounts::class);
    }

    public function performer() {
        return $this->belongsTo(User::class, 'performed_by');
    }
}
