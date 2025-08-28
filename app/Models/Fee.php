<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'fee_type',
        'amount',
    ];

    protected $guarded = [
        'user_id',
        'account_id',
        'applied_at',
    ];

    protected $guarded = [
        'user_id',
        'account_id';
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
