<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function makeComment(Request $request){

        $validator = Validator::make($request->all(), [
            "comment"=>"required|min:10|max:300",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $user=Auth::user();
        try{
            Comment::create([
                "content"=>$request->comment,
                "user_id"=>$user->id,
                "product_id"=>$request->id,
            ]);

            Log::info("User: ".$user->email." hase left a comment on product id:",$request->id);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function showComments(Request $request){
        try{
            $data["comments"]=Comment::where("product_id",$request->id)->orderBy("created_at","DESC")->get();
            return view("user.partials.comments",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

    }

    public static function Count(){
        try{
            return Comment::count();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }


}
