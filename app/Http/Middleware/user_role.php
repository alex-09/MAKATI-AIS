<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class user_role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->user()->user_role==1)
        {

            return $next($request);

        }else{

             return response()->json([
                'status' => false,
                'message' => 'You dont have access in admin part'
             ]);

        }

    }
}
