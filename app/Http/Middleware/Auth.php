<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has("idUserBiasa")) {
            return redirect()->route('userBiasaHome');
        }
        if (Session::has("idUserVip")) {
            return redirect()->route("userVipHome");
        }
        if (Session::has("idAdmin")) {
            return redirect()->route("AdminHome");
        }
        if (Session::has("idCs")) {
            return redirect()->route("CsHome");
        }
        return $next($request);
    }
}
