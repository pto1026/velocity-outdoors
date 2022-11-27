<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email'
    ];

    public function render()
    {
        return view('livewire.forgot-password');
    }

    public function submit()
    {
        $this->validate();

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect('/login')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
