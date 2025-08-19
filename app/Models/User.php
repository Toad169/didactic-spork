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
        // 'account_type',

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

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    // public function creditCards()
    // {
    //     return $this->hasMany(Payment::class);
    // }


    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isStaff(): bool
    {
        return $this->role === 'staff';
    }

    public function isAuditor(): bool
    {
        return $this->role === 'auditor';
    }
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

//     public function canAccessFilament(): bool
// {
//     return $this->hasRole('admin');
//     return $this->hasRole('staff');
//     return $this->hasRole('auditor');
// }



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
