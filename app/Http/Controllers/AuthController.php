<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'password' => 'required'
        ]);

        $loginWasSuccessful = Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ]);

        if ($loginWasSuccessful) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
