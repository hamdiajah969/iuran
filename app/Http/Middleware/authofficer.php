<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class authofficer
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->level == 'officer') {
                return $next($request);
            } else {
                return redirect()->route('beranda.index');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
