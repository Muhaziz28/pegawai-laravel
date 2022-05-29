<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->id_jabatan == 1 && Auth()->user()->is_out == 1) {
            // ! HRD
            return route('hrd.dashboard');
        } elseif (Auth()->user()->id_jabatan == 2 && Auth()->user()->is_out == 1) {
            // ! WEB DEV
            return route('webdev.dashboard');
        } elseif (Auth()->user()->id_jabatan == 3 && Auth()->user()->is_out == 1) {
            // ! LEADER GUDANG
            return route('leader-gudang.dashboard');
        } elseif (Auth()->user()->id_jabatan == 4 && Auth()->user()->is_out == 1) {
            // ! LEADER TOKO
            return route('leader-toko.dashboard');
        } elseif (Auth()->user()->id_jabatan == 5 && Auth()->user()->is_out == 1) {
            // ! LEADER FINANCE 
            return route('leader-finance.dashboard');
        } elseif (Auth()->user()->id_jabatan == 6 && Auth()->user()->is_out == 1) {
            // ! LEADER KREATIF
            return route('leader-kreatif.dashboard');
        } elseif (Auth()->user()->id_jabatan == 7 && Auth()->user()->is_out == 1) {
            // ! LEADER PRODUKSI
            return route('leader-produksi.dashboard');
        } elseif (Auth()->user()->id_jabatan >= 8 && Auth()->user()->is_out == 1) {
            // ! PEGAWAI
            return route('pegawai.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->is_out == 0) {
                return redirect()->route('login')->with('error', 'Akun anda tidak aktif!');
            } else {
                if (auth()->user()->id_jabatan == 1  && auth()->user()->is_out == 1) {
                    // ! HRD
                    return redirect()->route('hrd.dashboard');
                } else if (auth()->user()->id_jabatan == 2 && auth()->user()->is_out == 1) {
                    // ! WEBDEV
                    return redirect()->route('webdev.dashboard');
                } else if (auth()->user()->id_jabatan == 3 && auth()->user()->is_out == 1) {
                    // ! LEADER GUDANG
                    return redirect()->route('leader-gudang.dashboard');
                } else if (auth()->user()->id_jabatan == 4 && auth()->user()->is_out == 1) {
                    // ! LEADER TOKO
                    return redirect()->route('leader-toko.dashboard');
                } else if (auth()->user()->id_jabatan == 5 && auth()->user()->is_out == 1) {
                    // ! LEADER FINANCE
                    return redirect()->route('leader-finance.dashboard');
                } else if (auth()->user()->id_jabatan == 6 && auth()->user()->is_out == 1) {
                    // ! LEADER KREATIF
                    return redirect()->route('leader-kreatif.dashboard');
                } else if (auth()->user()->id_jabatan == 7 && auth()->user()->is_out == 1) {
                    // ! LEADER PRODUKSI
                    return redirect()->route('leader-produksi.dashboard');
                } else if (auth()->user()->id_jabatan >= 8 && auth()->user()->is_out == 1) {
                    // ! PEGAWAI
                    return redirect()->route('pegawai.dashboard');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau Password anda salah');
        }
    }
}
