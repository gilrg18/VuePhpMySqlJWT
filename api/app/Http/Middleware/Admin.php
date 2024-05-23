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
        //auth()->user() and check() are not persisting from login controller
        dd(auth()->user(), auth()->check(), session('isAdmin'));
        if(!auth()->check() || !session('isAdmin')){
            abort(403);
           //return redirect(route('user.index'));
        }
        return $next($request);
    }
}
