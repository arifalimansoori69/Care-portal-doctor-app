<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' => 0, // normal user default
        ]);

        Auth::login($user);

        // Redirect based on user role
        if ($user->user_role == 1) {
            return redirect()->route('admin.dashboard')->with('success', 'Registration successful!');
        } elseif ($user->user_role == 2) {
            return redirect()->route('doctor.dashboard')->with('success', 'Registration successful!');
        } else {
            return redirect()->route('index')->with('success', 'Registration successful!');
        }
    }
}
