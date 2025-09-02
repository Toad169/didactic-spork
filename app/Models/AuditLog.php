<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    //
    use HasFactory;

    protected $fillable = [
    ];

    protected $guarded = [
        'user_id',
        'model_type',
        'model_id',
        'action',
        'old_values',
        'new_values',
        'ip_address',
    ];

    protected $hidden = [
        'user_id',
        'ip_address',
    ];
}
