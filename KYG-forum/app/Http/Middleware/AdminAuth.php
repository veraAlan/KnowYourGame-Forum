<?php

namespace App\Http\Middleware;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // TODO ULTRA-REFACTOR, also check use of model, could be a better and easier call to role.
        $role = RoleController::show(UserRoleController::show(auth()->user()->id)[0]['idrole'])['description'];
        if (auth()->check() && $role == 'admin') {
            return $next($request);
        }

        // TODO Redirect and show error message for lesser privileges.
        return redirect('unauthorized');
    }
}
