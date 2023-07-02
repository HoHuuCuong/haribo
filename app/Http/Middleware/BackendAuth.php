<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BackendAuth
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
        if (Auth::guard('backend')->check()) {
            return $next($request);
        }
        return redirect()->route('b.account.showlogin')->with(['type' => 'pending', 'msg' => __('backend.logout.msg')]);;
    }
}
