<?php

namespace App\Http\Middleware;

use Closure;

class CheckIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request);

        $ipAr = explode('.', $request->ip());
        if ($ipAr[0] != 127 and $ipAr[1] != 0 and $ipAr[2] != 0 and $ipAr[3]==0 and $ipAr[3]<=24)
        {
            return redirect('/home');
        }
        return $next($request);
    }
}
