<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if user is not authenticated or is not an admin
        if(!auth()->check() || !auth()->user()->is_admin){
            abort(403);
           //return redirect(route('user.index'));
        }
        return $next($request);
    }
}
