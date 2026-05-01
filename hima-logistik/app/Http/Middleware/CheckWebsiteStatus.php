<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWebsiteStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin/*') || $request->is('admin') || $request->is('login') || $request->is('logout')) {
            return $next($request);
        }

        $setting = \App\Models\Setting::where('key', 'is_website_open')->first();
        $isOpen = $setting ? filter_var($setting->value, FILTER_VALIDATE_BOOLEAN) : true;

        if ($isOpen || auth()->check()) {
            return $next($request);
        }

        return response()->view('errors.503', [], 503);
    }
}
