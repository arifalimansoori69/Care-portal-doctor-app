<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
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
            \Log::warning('CheckUserRole: User not authenticated, redirecting to login');
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Log the user's current role and required roles
        \Log::info('CheckUserRole: Checking access', [
            'user_id' => $user->id,
            'user_role' => $user->user_role,
            'required_roles' => $roles,
            'current_route' => $request->route()->getName(),
            'has_role' => in_array($user->user_role, $roles) ? 'Yes' : 'No'
        ]);
        
        // Check if user has the required role
        if (in_array($user->user_role, $roles)) {
            \Log::info('CheckUserRole: Access granted', [
                'user_id' => $user->id,
                'route' => $request->route()->getName()
            ]);
            return $next($request);
        }

        // Log unauthorized access attempt
        \Log::warning('CheckUserRole: Unauthorized access attempt', [
            'user_id' => $user->id,
            'user_role' => $user->user_role,
            'required_roles' => $roles,
            'current_route' => $request->route()->getName()
        ]);

        // Redirect based on user's role
        if ($user->user_role == 1) {
            \Log::info('CheckUserRole: Redirecting admin to admin.dashboard');
            return redirect()->route('admin.dashboard');
        } elseif ($user->user_role == 2) {
            \Log::info('CheckUserRole: Redirecting doctor to doctor.dashboard');
            return redirect()->route('doctor.dashboard');
        }

        \Log::warning('CheckUserRole: User has no valid role, redirecting to home');
        return redirect('/');
    }
}
