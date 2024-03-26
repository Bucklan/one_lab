<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{

    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if (auth()->user()->role->name !== $role) {
            return response()->json(['message' => 'You are role not incorrect'], 401);
        }
        return $next($request);
    }
}
