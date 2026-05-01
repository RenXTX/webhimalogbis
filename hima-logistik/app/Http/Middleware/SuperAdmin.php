<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->isSuperAdmin()) {
            return $next($request);
        }
        
        abort(403, 'Akses Ditolak! Hanya Super Admin yang dapat mengakses halaman ini.');
    }
}
