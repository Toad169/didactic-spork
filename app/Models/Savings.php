<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savings extends Model
{
    /** @use HasFactory<\Database\Factories\SavingsFactory> */
    use HasFactory;

    protected $fillable = [
        'account_id', 'title', 'target_amount', 'current_amount', 'status','is_locked', 'deadline'
    ];

    public function account() {
        return $this->belongsTo(Accounts::class);
    }
}
