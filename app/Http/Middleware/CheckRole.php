<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user has one of the specified roles
        if (auth()->user()->roles !== 'author') {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
