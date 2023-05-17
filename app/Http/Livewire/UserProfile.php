<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserProfile extends Component
{
    public $fname, $lname, $email;

    public function mount() {
        $this->fname = auth()->user()->fname;
        $this->lname = auth()->user()->lname;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.user-profile')->layout('livewire.layouts.base');
    }
}
