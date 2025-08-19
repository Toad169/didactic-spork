<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'account_id',
        'savings_number',
        'savings_type',
        'title',
        'current_balance',
        'target_balance',
        'target_date',
        'status',
    ];
}
