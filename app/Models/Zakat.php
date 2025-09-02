<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'income',
        'savings',
        'gold',
        'silver',
        'assets',
        'debts',
        'total_wealth',
        'nisab_threshhold',
        'zakatable_amount',
        'zakat_due',
        'calculation_year',
    ];

    protected $guarded = [
        'user_id',
        'account_id',
        'paid',
        'paid_at',
    ];

    protected $hidden = [
        'user_id',
        'account_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
