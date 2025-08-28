<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'contract_number',
        'contract_type',
        'title',
    ];

    protected $guarded = [
        'user_id',
        'account_id',
        'status',
        'signed_at',
        'expired_at',
    ];

    protected $hidden = [
        'user_id',
        'account_id', // optional, only if you don't want APIs to show it
    ];


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
