<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

Route::get('/test-login', function () {
    // Test with a known admin user (replace 1 with an actual admin user ID)
    $user = \App\Models\User::find(1);
    
    if ($user) {
        Auth::login($user);
        
        // Log the user details
        Log::info('Test login - User details:', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'user_role' => $user->user_role,
            'is_authenticated' => Auth::check(),
            'intended' => redirect()->intended()->getTargetUrl()
        ]);
        
        // Redirect to dashboard
        return redirect()->route('dashboard');
    }
    
    return 'User not found';
});
