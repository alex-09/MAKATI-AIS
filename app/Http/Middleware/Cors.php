<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
        ->header('Access-Control-Allow-Origin', 'http://localhost:8000',
            'http://127.0.0.1:80',
            'http://127.0.0.1:80',
            'http://makati-ais.com',
            'http://makati-ais-api.com',
            'http://ais.simplevia.com',
            'http://ais-api.simplevia.com',)

        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')

        ->header('Access-Control-Allow-Headers',' Origin, Content-Type, Accept, Authorization, X-Request-With, Authentication')

        ->header('Access-Control-Allow-Credentials',' true');
    }
}
