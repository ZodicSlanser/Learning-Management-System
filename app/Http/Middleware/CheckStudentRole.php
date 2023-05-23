<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStudentRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== \App\Models\Role::STUDENT) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
