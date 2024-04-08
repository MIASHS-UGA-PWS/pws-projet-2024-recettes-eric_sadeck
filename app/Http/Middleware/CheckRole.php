<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next, $role)
{
    if (! $request->user()->roles->pluck('name')->contains($role)) {
        return redirect()->route('login')->with('error', "Accès refusé. Vous n'avez pas les droits nécessaires pour accéder à cette page.");
    }

    return $next($request);
}

/* public function handle($request, Closure $next, ...$roles)
{
    // Case of any attempt to access the route directly without authentication
    if (!Auth::check())
        return redirect('login');

    $user = Auth::user();

    if($user->isAdmin())
        return $next($request);

    foreach($roles as $role) {
        // Check if user has the role This check will depend on how your roles are set up
        if($user->hasRole($role))
            return $next($request);
    }

    return redirect('login')->with('error', "You don't have admin access.");
} */

}
