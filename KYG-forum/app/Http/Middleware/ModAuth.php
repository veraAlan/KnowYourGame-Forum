<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use App\Models\UserRole;

class ModAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            $roleid = UserRole::where('id_user', auth()->user()->id);
            $role = Role::find($roleid)->description;
            if (($role == Role::find(2)->description || $role == Role::find(1)->description)) {
                return $next($request);
            }
            // TODO Redirect and show error message for lesser privileges.
            return redirect('unauthorized');
        }

        return redirect('not-logged');
    }
}
