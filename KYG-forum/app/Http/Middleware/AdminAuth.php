<?php

namespace App\Http\Middleware;

use App\Models\UserRole;
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
        if (auth()->check()) {
            $sessionRole = UserRole::find(auth()->user()->id);
            if(in_array($sessionRole->role_id, [1])){
                return $next($request);
            }
            // TODO Redirect and show error message for lesser privileges.
            return redirect('unauthorized');
        }

        return redirect('not-logged');
    }
}
