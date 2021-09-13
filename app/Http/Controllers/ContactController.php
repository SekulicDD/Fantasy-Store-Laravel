<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends OsnovniController
{
    public function index(){
        return view('user.pages.contact', $this->data);
    }

    public function sendMessage(Request $request){

        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'message'=>'required|min:10|max:400',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        try{
            Message::create([
                'email'=>$request->email,
                'message'=>$request->message,
                'created_at'=>date('Y-m-d H:i:s')
            ]);

            //$admins=User::where("role_id",1)->get();

            Log::info("Received message from: ".$request->email);
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

    }



}
