<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
            $sessionRole = auth()->user()->role->role_id;
            if(in_array($sessionRole, [1, 2])){
                return $next($request);
            }
            return redirect('unauthorized')->with('status', 'Not authorized to make that request.');
        }

        return redirect('not-logged');
    }
}
