<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== \App\Models\Role::ADMIN) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
