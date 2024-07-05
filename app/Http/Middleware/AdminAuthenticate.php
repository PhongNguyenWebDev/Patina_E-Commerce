<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('ermsg', 'Vui lòng đăng nhập để vào Admin');
        } elseif (!Auth::user()->role == 0) {
            return redirect()->route('client.home-page')->with('ermsg', 'Bạn không được cấp quyền để vào Admin');
        }
        return $next($request);
    }
}
