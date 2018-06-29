<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('invitado', ['only' => ['ShowLoginForm','login']]);
        $this->middleware('autenticado', ['only' => ['logout']]);
        $this->middleware('mesa', ['only' => ['logoutMesa']]);
    }
    public function ShowLoginForm()
    {
        return view('autenticacion.login');
    }

    public function login(LoginRequest $request)
    {
        $remember = true;
        if(Auth::attempt($request->validated(),$remember)){
            if(Auth::user()->esMesa()){
                return redirect()->route('menu');
            }
            return redirect()->route('inicio');
        }
        return back()
            ->withErrors(['username' => trans('auth.failed')])
            ->withInput(request(['username']));
    }
    public function logout()
    {
        Auth::logout();     
        return redirect()->route('inicio');
    }
    public function logoutMesa(LoginRequest $request)
    {
        if(Auth::attempt($request->validated())){
            return redirect()->route('logout');
        }
        return back()
            ->withErrors(['password' => 'contraseña incorrecta']);
    }    
}
