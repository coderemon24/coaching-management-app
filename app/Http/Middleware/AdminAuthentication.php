<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = auth()->guard('admin');
        $isLoginPage = $request->is('admin/login') || $request->is('admin/login-form');

        // If not authenticated and not on login page, redirect to login
        if (!$admin->check() && !$isLoginPage) {
            return redirect()->route('admin.login');
        }

        // If authenticated and trying to access login page, redirect to dashboard
        if ($admin->check() && $isLoginPage) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
