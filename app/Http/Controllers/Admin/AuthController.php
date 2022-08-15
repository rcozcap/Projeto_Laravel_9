<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function mainPanel()
    {
        if(Auth::check() === true){
        return view('admin.main_panel');
        }
        return redirect()->route('admin.login')->withInput()->withErrors(['Você não tem permissão para acessar a área de administrador']);
    }
    public function loginPanel()
    {
        if(Auth::check() === true){
            return view('admin.main_panel');
        }
        
        return view('admin.formLogin');
    }
    public function login(LoginRequest $request)
    {
        $request->except(['_token']);
        
        $credentials = [

            'email' => $request->log_email,
            'password' => $request->log_pass,
        ];

        if(Auth::attempt($credentials)){

            return redirect()->route('admin');
        }
        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}