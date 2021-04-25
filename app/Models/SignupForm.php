<?php
namespace App\Models;

use App\Models\Interfaces\FormInterface;
use Illuminate\Support\Facades\Hash;

class SignupForm extends AbstractForm
{
    public $name;
    public $email;
    public $pw;
    public $pw_confirm;

    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->pw = Hash::make($this->pw);

        return $user->save();

    }

    public function validate(): bool
    {
        if (empty($this->name) || empty($this->email) || empty($this->pw) || empty($this->pw_confirm)) {
            return false;
        }

        if ($this->pw !== $this->pw_confirm) {
            return false;
        }
        return true;
    }
}
