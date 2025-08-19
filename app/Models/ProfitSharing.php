<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitSharing extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'account_id',
        'contract_id',
        // 'profit_rate',
        'profit_amount',
        'distributed_at',
    ];
}
