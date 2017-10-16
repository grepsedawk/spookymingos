<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfAdmin
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
            if ($user->admin === 1){
                return $next($request);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }
}
