<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'type',
        'provider',
        'provider_id',
        'provider_api',
        'last_four',
        'is_default',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = [
        'user_id',
    ];

    /**
     * Get the user that owns the Payment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
