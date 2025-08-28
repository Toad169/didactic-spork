<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'savings_number', 
        'savings_type', 
        'title', 
        'target_balance', 
        'target_date'
    ];
    
    protected $guarded = [
        'user_id',
        'account_id', 
        'current_balance', 
        'status'
    ];
    
    protected $hidden = [
        'user_id',
        'account_id'
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
