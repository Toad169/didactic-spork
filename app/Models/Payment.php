<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'type',
        'provider',
    ];

    protected $guarded = [
        'user_id',
        'provider_id',
    ];

    protected $hidden = [
        'provider_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
