<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginComponent extends Component
{
    public $username, $password;

    public function authenticate() {

        $cred = $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $login = auth()->attempt($cred);

        if($login) {
            return redirect()->intended('/');
        } else {
            session()->flash('error', 'Invalid username or password.');
        }
    }

    public function render()
    {
        return view('livewire.login-component')->layout('livewire.layouts.base');
    }
}
