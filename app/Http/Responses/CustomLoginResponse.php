<?php

namespace App\Http\Responses;

use Laravel\Fortify\Http\Responses\LoginResponse as FortifyLoginResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse extends FortifyLoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        // Log user role for debugging
        Log::info('User logged in', [
            'user_id' => $user->id,
            'email' => $user->email,
            'user_role' => $user->user_role
        ]);
        
        // Check user role and redirect accordingly
        if ($user->user_role == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->user_role == 2) {
            return redirect()->route('doctor.dashboard');
        }
        
        // Fallback to the home page if user role is not recognized
        return redirect()->route('index');
    }
}
