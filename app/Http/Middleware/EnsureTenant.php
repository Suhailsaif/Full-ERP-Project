<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTenant
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        if (!auth()->user()->company_id) {
            return response()->json([
                'message' => 'Tenant not assigned'
            ], 403);
        }

        return $next($request);
    }
}
