<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CounterMiddleware
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
        if(Auth::user()->counter_id == 0){
            abort('401');
        }
        return $next($request);
    }
}
