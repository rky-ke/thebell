<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Register
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Login
        Auth::login($user);

        // Redirect the user
        return redirect()->route('login');
    }

    // Login User
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Try to Login User
        if (Auth::attempt($fields, $request->remember_me)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    // Logout User
    public function logout(Request $request)
    {
        // Logout User
        Auth::logout();

        // Invalidate Session
        $request->session()->invalidate();

        // Regenerate CSRF Token
        $request->session()->regenerateToken();

        // Redirect User
        return redirect()->route('login');

    }

    public function profile()    
    {
        return view('users.profile');
    }

    public function settings()    
    {
        return view('users.settings');
    }

    public function notifications()    
    {
        return view('users.notifications');
    }

}
