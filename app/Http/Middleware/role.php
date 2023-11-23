<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role === "agency"){
            return $next($request);
        }
        return response()->json("failure", 403);
    }
//    public function handle(Request $request, Closure $next, $userType)
//    {
//        if(auth()->user()->type == $userType){
//            return $next($request);
//        }
//
//        return response()->json(['You do not have permission to access for this page.']);
//        /* return response()->view('errors.check-permission'); */
//    }
}
