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
            return redirect()->route('login.form')->withErrors('You are not authorized to access this page');
        }
        if (auth()->user->role->name !== $role) {
            return redirect()->route('login.form')->withErrors('You are not authorized to access this page');
        }
        return $next($request);
    }
}
