<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DarkModeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Set default dark mode preference
        if (!$request->session()->has('dark_mode')) {
            $request->session()->put('dark_mode', true); // Default to dark mode
        }

        // Share dark mode preference with all views
        view()->share('darkMode', $request->session()->get('dark_mode', true));

        return $next($request);
    }
}