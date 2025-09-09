<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        // 'account_type',

    ];

    protected $guarded = [
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }



    public const ROLE_ADMIN = 'admin';
    public const ROLE_STAFF = 'staff';
    public const ROLE_USER = 'user';

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }



    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function zakat()
    {
        return $this->hasMany(Zakat::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function profitDistributions()
    {
        return $this->hasMany(ProfitDistribution::class);
    }

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
}
