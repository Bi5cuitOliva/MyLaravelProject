<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
       
        if (!Auth::check()) {
            abort(401);
        }

          /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->hasRole('writer')) {
            abort(403);
        }

        return $next($request);
    }
}
