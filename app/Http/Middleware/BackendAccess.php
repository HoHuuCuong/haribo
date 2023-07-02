<?php

namespace App\Http\Middleware;

use App\Model\Roles;
use Closure;

class BackendAccess
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
        if (Roles::check($request->route()->getName())){
            return $next($request);
        }
        return $request->header('x-csrf-ajax')?response()->json(['msg'=>'Access deny','title'=>'Permission action','status'=>'danger'],200):redirect()->route('b.accessdeny');
    }
}
