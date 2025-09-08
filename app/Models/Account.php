<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    use HasFactory;

    protected $fillable = [
    'account_number',
    'account_type',
    'title',
    ];

    protected $guarded = [
    'user_id',
    'status',
    ];

    protected $hidden = [
    'user_id', // optional if you don't want it exposed
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function profit()
    {
        return $this->hasMany(ProfitDistribution::class);
    }

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function zakat()
    {
        return $this->hasMany(Zakat::class);
    }
}
