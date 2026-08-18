<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class RedirectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Handle post-registration redirect
        Event::listen(Registered::class, function ($event) {
            // Default redirect after registration
            return redirect()->route('index');
        });

        // Handle post-login redirect based on user role
        Event::listen(Login::class, function ($event) {
            $user = $event->user;
            
            if ($user->user_role == 1) {
                // Admin dashboard
                return redirect()->route('admin.dashboard');
            } elseif ($user->user_role == 2) {
                // Doctor dashboard
                return redirect()->route('doctor.dashboard');
            }
            
            // Default redirect for other users
            return redirect()->route('index');
        });
    }
}
