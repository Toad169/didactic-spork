<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class Signin extends Component
{
    public $name = '';
    public $email = '';
    public $phone_number = '';
    public $password = '';
    public $password_confirmation = '';

    public function signin()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.signin');
    }

}
