<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    /** @use HasFactory<\Database\Factories\ReportsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'report_type', 'period_start', 'period_end', 'content', 'status', 'generated_by'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function generator() {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
