<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }
    
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            // ✅ Role-based redirect logic
            if ($user->user_role == 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->user_role == 2) {
                return redirect()->route('doctor.dashboard');
            } else {
                return redirect()->route('index')->with('success', 'Login successful!');
            }
        }
    
        throw ValidationException::withMessages([
            'email' => ['These credentials do not match our records.'],
        ]);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
