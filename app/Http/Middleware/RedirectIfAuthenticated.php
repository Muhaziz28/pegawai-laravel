<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->id_jabatan == 1 && Auth::user()->is_out == 1) {
                // ! HRD
                return redirect()->route('hrd.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->id_jabatan == 2 && Auth::user()->is_out == 1) {
                // ! WEBDEV
                return redirect()->route('webdev.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->id_jabatan == 3 && Auth::user()->is_out == 1) {
                // ! LEADER GUDANG
                return redirect()->route('leader-gudang.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->id_jabatan == 4 && Auth::user()->is_out == 1) {
                // ! LEADER TOKO
                return redirect()->route('leader-toko.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->id_jabatan == 5 && Auth::user()->is_out == 1) {
                // ! LEADER FINANCE
                return redirect()->route('leader-finance.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->id_jabatan == 6 && Auth::user()->is_out == 1) {
                // ! LEADER  KREATIF
                return redirect()->route('leader-kreatif.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->id_jabatan == 7 && Auth::user()->is_out == 1) {
                // ! LEADER PRODUKSI
                return redirect()->route('leader-produksi.dashboard');
            } elseif (Auth::guard($guard)->check() && Auth::user()->id_jabatan >= 8 && Auth::user()->is_out == 1) {
                // ! PEGAWAI
                return redirect()->route('pegawai.dashboard');
            }
        }

        return $next($request);
    }
}
