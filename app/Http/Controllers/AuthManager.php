<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
   function login(){
       return view('login');
    }

    function loginPost(Request $request){
    $request->validate([
        "email" => "required",
        "password" => "required|confirmed|min:8"
    ]);

    $credentials = $request->only('email', 'password');
    if(Auth::attempt($credentials)){
        return redirect()->intended(route('Acceuil'));
        }
        return redirect("login")->with("Error", "Identifiant ou mot de passe invalide");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
