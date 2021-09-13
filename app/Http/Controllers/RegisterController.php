<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function register(Request $request){

        $email=$request->input("email");


        $credentials = $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required",
        ]);

        try {
            $emailTest=User::where("email",$email)->first();

            if($emailTest!=null){
                return redirect()->route("loginPage")->with("message","Email already taken!!");
            }

            $user=User::create($request->except("password") + ["password"=>Hash::make($request->password)]);


            Log::info("New user registered with email:" .$user->email);
            return redirect()->route("loginPage")->with("message","Registred successfully");
        }
        catch (\Exception $e){

            Log::error($e->getMessage());
            abort(500);
        }
    }


}
