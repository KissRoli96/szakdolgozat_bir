<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginForm extends AbstractForm
{
    public $email;
    public $pw;

    public function login(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $user = User::where('email', $this->email)->first();
        if (empty($user)) {
            return false;
        }

        if (!Hash::check($this->pw, $user->pw)) {
            return false;
        }

        return Auth::loginUsingId($user->id_user);
    }

    public function validate(): bool
    {
        if (empty($this->pw) && empty($this->email)) {
            return false;
        }

        return true;
    }
}
