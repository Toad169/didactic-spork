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
        'role',
        'account_type',

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
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function users()
    {
        return ;
    }

    public function account()
    {
        return $this->hasOne(Accounts::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contracts::class);
    }

    public function goals()
    {
        return $this->hasMany(Goals::class);
    }

    public function logs()
    {
        return $this->hasMany(Logs::class);
    }

    public function reports()
    {
        return $this->hasMany(Reports::class);
    }

    public function generatedReports()
    {
        return $this->hasMany(Reports::class, 'generated_by');
    }

    public function savings()
    {
        return $this->hasManyThrough(Savings::class, Accounts::class);
    }

    public function transactions()
    {
        return $this->hasManyThrough(Transactions::class, Accounts::class);
    }

    public function performedTransactions()
    {
        return $this->hasMany(Transactions::class, 'performed_by');
    }

    public function approvedContracts()
    {
        return $this->hasMany(Contracts::class, 'approved_by');
    }

    /**
     * Check if the user is an admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin' || $this->account_type === 'admin';
    }

    public function isStaff(): bool
    {
        return $this->role === 'staff' || $this->account_type === 'staff';
    }

    public function isAuditor(): bool
    {
        return $this->role === 'auditor' || $this->account_type === 'auditor';
    }

    public function isUser(): bool
    {
        return $this->role === 'user' || $this->account_type === 'user';
    }

    public function canAccessFilament(): bool
{
    return $this->hasRole('admin');
    return $this->hasRole('staff');
    return $this->hasRole('auditor');
}



    // public function canAccessPage(string $page): bool
    // {
    //     return match ($page) {
    //         'dashboard' => true,
    //         'budget' => $this->isAdmin() || $this->isStaff(),
    //         'goals' => $this->isAdmin() || $this->isStaff(),
    //         'logs' => $this->isAdmin(),
    //         'reports' => true,
    //         'savings' => true,
    //         'security' => true,
    //         'settings' => true,
    //         'transactions' => true,
    //         'transfers' => $this->isAdmin() || $this->isStaff(),
    //         'users' => $this->isAdmin(),
    //         default => false,
    //     };
    // }


}
