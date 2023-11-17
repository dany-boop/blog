<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'author' && auth()->user()->role_id != 1) {
            abort(403);
        }

        if ($role == 'user' && auth()->user()->role_id != 2) {
            abort(403);
        }
        return $next($request);
    }
}
