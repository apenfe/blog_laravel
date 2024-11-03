<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // First priority: Check cookie
        $locale = $request->cookie('locale');

        // Second priority: Check session
        if (!$locale && Session::has('locale')) {
            $locale = Session::get('locale');
        }

        // Last priority: Use default locale from config
        if (!$locale) {
            $locale = config('app.locale', 'en');
        }

        // Validate and set the locale
        if (in_array($locale, ['en', 'es'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);

            // If we got locale from session but no cookie exists, set the cookie
            if (!$request->cookie('locale')) {
                cookie()->forever('locale', $locale);
            }
        }

        return $next($request);
    }
}
