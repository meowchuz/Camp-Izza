<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ValidateUserMiddleware
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
        if ('parent' == Auth::user()->roles[0]->name && !Auth::user()->fullFill) {
            return redirect()->route('contact');
        }

        return $next($request);
    }
}
