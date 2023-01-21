<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(): object
    {
        if (!Auth::check()) {
            return Inertia::render('auth/Login');
        } else {
            return redirect()->route('dashboard.index');
        }
    }

    public function authenticate(Request $request): object
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', "You're login successfully!");
        }
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout(): object
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Your current session is logout successfully!');
    }
}
