<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    function login(Request $request)
    {

        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (!Auth::attempt($credentials)) {
            return redirect()->route("loginPage")->with("message", "Wrong username or password!");
        }


        return redirect()->route("home");;
    }
}

    function logout(){
        Log::info("User: ".Auth::user()->email." logged out");
        Auth::logout();
        return redirect()->route("loginPage")->with("message","Logged out successfully!");
    }
}
