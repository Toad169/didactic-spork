<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'account_id',
        'contract_number',
        'contract_type',
        'title',
        'profit_rate',
        'signed_at',
        'expired_at',
        'status',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function profitSharings()
    {
        return $this->hasMany(ProfitSharing::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
