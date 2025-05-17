<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CanViewReports
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
        {
            $user = Auth::user();

            // Allowed roles by is_role integer: 0 = Senior, 1 = Analyst, 2 = Manager, 3 = Admin
            $allowedRoles = [0, 1, 2, 3];

            if ($user && in_array($user->is_role, $allowedRoles)) {
                return $next($request);
            }

            abort(403, 'Unauthorized access to production reports.');
        }
}
