<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect().route('index');
        }

        return back()->withErrors([
            'email' => 'Wrong credentials',
        ])->onlyInput('email');
    }

    public function showLoginForm(Request $request) {
        return view('login');
    }
}
