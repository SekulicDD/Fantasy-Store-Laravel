<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminMessageController extends Controller
{
    public function showMessages(){

        $perPage=8;
        try{
            $messages=Message::paginate($perPage);
            $data["messages"]=$messages;
        }
        catch (\Exception $e){
            //return $e->getMessage();
            Log::error($e->getMessage());
            abort(500);
        }

        return view("admin.partials.messages.messages",$data);
    }

    public function deleteMessage(Request $request){
        try{
            Message::find($request->id)->delete();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }
}
