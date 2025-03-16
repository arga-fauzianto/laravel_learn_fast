<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        if (!Auth::check() && !$request->is('login', 'register')) {
            return redirect()->route('login');
        }
    
        if (Auth::check() && $request->is('login', 'register')) {
            return redirect()->route('auth.login'); // Redirect ke board kalau udah login
        }
    
        return $next($request);
    }
    

}
