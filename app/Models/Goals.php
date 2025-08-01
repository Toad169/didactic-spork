<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    /** @use HasFactory<\Database\Factories\GoalsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'target_amount', 'saved_amount', 'expected_date', 'priority', 'is_achieved'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
