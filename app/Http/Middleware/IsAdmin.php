<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->level !== 1) {
            echo "<script>alert('You don\'t have access to this page!');window.location.href='/';</script>";
            // return redirect('/');
        }

        return $next($request);
    }
}
