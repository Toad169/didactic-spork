<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'account_id',
        'fee_type',
        'amount',
        'applied_at'
        // 'description',
    ];
}
