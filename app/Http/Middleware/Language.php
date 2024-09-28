<?php

namespace App\Http\Middleware;
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check the first segment of the URL or session
        $locale = $request->segment(1);

        if (in_array($locale, config('app.available_locales'))) {
            App::setLocale($locale);
            Session::put('locale', $locale); // Save the locale to session
        } elseif (Session::has('locale')) {
            App::setLocale(Session::get('locale')); // Get locale from session if exists
        } else {
            App::setLocale('ar'); // Default to Arabic
        }

        return $next($request);
    }
}
