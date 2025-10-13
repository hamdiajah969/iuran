<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on user level
            switch ($user->level) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'officer':
                    return redirect()->route('officer.dashboard');
                case 'warga':
                    return redirect()->route('warga.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['username' => 'Invalid user level.']);
            }
        }

        return redirect()->route('login')->withErrors(['username' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
