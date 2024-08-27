<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('login');
        }

        // Get the user's role
        $userRole = Auth::user()->role;

        // Check if the user's role is in the allowed roles
        if (!in_array($userRole, $roles)) {
            // If not, redirect them to the home page or an unauthorized page
            return redirect('home')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
