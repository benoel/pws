<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->isAdmin() ) {
            if (Auth::user()->isActive()) {
                return $next($request);
            }else{
                // dd('admin di block');
                Auth::logout();
                return redirect('/login')->with('alert-info', 'User tidak aktif!');
            }
        }

        return redirect('/login');
    }
}
