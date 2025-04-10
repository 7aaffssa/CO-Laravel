<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $nom = $request->query('nom');
        if ($nom && $nom === 'admin') {
            return $next($request);}
        abort(403, 'Accès refusé : nom d\'utilisateur incorrect.');
    }
}