<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
      if(auth()->check()) {
        $user = auth()->user();
        if($user->hasRole($role)) {
          return $next($request);
        }
      }
      abort(403, 'Accès non autorisé - Rôle insuffisant');
    }
}
