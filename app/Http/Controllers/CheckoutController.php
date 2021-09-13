<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends OsnovniController
{
    public function index(){

        $user=Auth::user();
        try {

            $tmp=CartController::getByUser($user->id);

            $this->data["user"]=$user;
            $this->data["sum"]=$tmp["sum"];
            $this->data["products"]=$tmp["products"];

            return view("user.pages.checkout",$this->data);
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function addOrder(Request $request){
        $user=Auth::user();

        try {
            $tmp=CartController::getByUser($user->id);
            $order=Order::create([
                "user_id"=>$user->id,
                "phone"=>$request->phone,
                "address"=>$request->address,
                "total"=>$tmp["sum"],
                "created_at"=>date('Y-m-d H:i:s')
            ]);

            foreach ($tmp["products"] as $product){
                $order->products()->attach($product->id);
            }

            Cart::where("user_id",$user->id)->delete();
            return redirect()->route("cart")->with("msg","Products successfully ordered!");
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public static function getRecentOrders(){
        try{
            return Order::orderBy("created_at","DESC")->limit(5)->get();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public static function Count(){
        try{
            return Order::count();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }


}
