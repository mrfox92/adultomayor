<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request) {

        // dd($request);
        $credencials = request()->only('email', 'password');

        if( auth()->attempt( $credencials ) ){

            //  regeneramos la sesion para evitar ataque de tipo Session Fixation
            request()->session()->regenerate(); //  se encarga de regenerar el token csrf

            return redirect( route('home') );
        }

        // return redirect('login');
        return back()->with('message', [
            'class'     =>  'danger',
            'message'   =>  __("El correo o la contraseña ingresada no son correctas, por favor reintente.")
        ]);
    }

    public function logout ( Request $request ) {
        auth()->logout();
        session()->flush();
        return redirect('login');
    }
}
