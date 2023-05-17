<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class RegisterComponent extends Component
{
    public $username, $fname, $lname, $gender, $email, $password, $password_confirmation;

    public function register() {
        $user = $this->validate([
            'username' => 'required|string|unique:users',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'username' => $this->username,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'gender' => $this->gender,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        return redirect('/register')->with('message', 'Account created successfully!');

    }

    public function render()
    {
        return view('livewire.register-component')->layout('livewire.layouts.base');
    }
}
