<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): mixed
    {
        $user = $request->user();

        if (!$user) {
            Log::info('No user found');
            abort(403, 'Unauthorized action.');
        }

        $hasRole = $user->hasRole($role);
        Log::info('User role check', [
            'user_id' => $user->id,
            'required_role' => $role,
            'has_role' => $hasRole,
            'roles' => $user->roles()->pluck('name')
        ]);

        if (!$hasRole) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
