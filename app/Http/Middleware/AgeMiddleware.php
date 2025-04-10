<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $age = $request->query('age'); 
        if ($age && $age > 21) {
            return $next($request);}
        abort(404); 
    }
}