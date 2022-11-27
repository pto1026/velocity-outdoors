<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm;
    public $e = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'confirm' => 'same:password|required'
    ];

    public function render()
    {
        return view('livewire.register-page');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register(Request $request)
    {
        $this->validate();
        if (count(User::where('email', '=', $this->email)->get()->values()->all()) > 0) {
            $this->e = true;
            return null;
        }
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();
        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }
    }
}
