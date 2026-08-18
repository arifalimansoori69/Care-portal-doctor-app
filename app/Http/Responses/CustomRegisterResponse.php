<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class CustomRegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->user_role == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->user_role == 2) {
            return redirect()->route('doctor.dashboard');
        }

        return redirect()->route('index'); // Default for normal users
    }
}
