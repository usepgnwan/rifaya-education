<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        $role= $user->roles->pluck('id')->toArray();
        $roles = array_map('intval', $roles);
        if (!$user || empty(array_intersect($role, $roles))) {
            abort(401, 'Unauthorized');
        }

        return $next($request);
    }
}
