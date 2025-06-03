<?php

namespace App\Http\Middleware;

use App\Models\Admin\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminChangeLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $code = Language::where('dashboard_default', 1)->pluck('code')->first();

        if ($code) {
            app()->setLocale('admin_' . $code);
        } else {
            app()->setLocale(config('app.locale')); 
        }

        return $next($request);
    }
}
