<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Check if user has the role
        if (in_array($user->user_role, $roles)) {
            return $next($request);
        }

        // Redirect based on role
        if ($user->user_role == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->user_role == 2) {
            return redirect()->route('doctor.dashboard');
        }

        return redirect('index');
    }
}
