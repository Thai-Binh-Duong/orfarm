<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if( Auth::check() ){
            if( Auth::user()->is_admin == 1 ){
                return $next($request);
                // return redirect('/admin');
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('login');
        }
        
    }
}