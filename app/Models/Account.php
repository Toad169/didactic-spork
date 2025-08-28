<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_number',
        'account_type',
        'title',
        'status',
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

    public function profitSharings()
    {
        return $this->hasMany(ProfitSharing::class);
    }

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function zakatCalculation()
    {
        return $this->hasMany(ZakatCalculation::class);
    }
}
