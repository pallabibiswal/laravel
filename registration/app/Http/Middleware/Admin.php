<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
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
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }
        \Session::flash('status', 'You Do Not Have Authentication To Access This Page!');
        return redirect('/');
    }
}
