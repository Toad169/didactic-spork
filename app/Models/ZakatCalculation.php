<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZakatCalculation extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nisab_threshhold',
        'zakatable_amount',
        'zakat_due',
        'calculation_year',
        'paid',
        'paid_at',
    ];

    protected $guarded = [
        'user_id',
        'account_id',
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
