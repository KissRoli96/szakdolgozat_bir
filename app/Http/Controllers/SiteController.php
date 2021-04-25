<?php

namespace App\Http\Controllers;

use App\Models\LoginForm;
use App\Models\SignupForm;
use App\Models\User;

class SiteController extends Controller
{

    public function login()
    {
        if (request()->post()) {
            $loginForm = new LoginForm(request()->all());

            if ($loginForm->login()) {
                request()->session()->flash('success', 'Sikeres belépés');
                return redirect("/");
            }
            request()->session()->flash('error', 'Sikeres belépés');

        }
        return view('site.login');
    }

    public function signup() {
        if (request()->post()) {

            $signupForm = new SignupForm(request()->all());

            if ($signupForm->signup()) {

                request()->session()->flash('success', 'Sikeres regisztráció');
                return redirect('/');

            }
            request()->session()->flash('error', 'Belső hiba történt');

        }

    //    $2y$10$e6WS9N81JHz05F4giZ49j.K0GViB9Vs.579iki3/KKnlSiyFEksZm
        return view('site.signup');
    }
}
