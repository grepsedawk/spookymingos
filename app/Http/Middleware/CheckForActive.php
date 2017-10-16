<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckForActive
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
        $user = Auth::user();
        if ($user){
            if ($user->active === 1){
                return $next($request);
            } else {
                return redirect('/nonactive');
            }
        } else {
            return redirect('/nonactive');
        }
    }
}
