<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    /** @use HasFactory<\Database\Factories\ContractsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'terms', 'signed_at', 'expires_at', 'approved_by'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function approver() {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
