<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends OsnovniController
{
    public function index()
    {

        $user=Auth::user();

        try {
            $tmp=self::getByUser($user->id);

            $this->data["products"]=$tmp["products"];
            $this->data["sum"]=$tmp["sum"];

            return view('user.pages.cart', $this->data);
        }

        catch (\Exception $e){

            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function store(Request $request){
        $user=Auth::user();

        try{
            $product=Cart::where("user_id",$user->id)->where("product_id",$request->id)->first();

            if($product){
                $product->quantity=$product->quantity+1;
                $product->save();
            }

            else {
                Cart::create(["user_id" => $user->id, "product_id" => $request->id, "quantity" => 1]);
            }

            Log::info("User ".$user->email." added to cart product with id:".$request->id);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function delete(Request $request){
        $user=Auth::user();

        try{
            $product=Cart::where("user_id",$user->id)->where("product_id",$request->id)->first();
            $product->delete();
            Log::info("User ".$user->email." removed from cart product with id:".$request->id);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public static function getByUser($id){
        try{
            $cart=Cart::where("user_id",$id)->get();

            $products=array();
            $sum=0;
            foreach ($cart as $item){
                $tmp=Product::where("id",$item->product_id)->first();
                $tmp->setAttribute("quantity",$item->quantity);
                array_push($products,$tmp);
                $sum+=$tmp->price*$tmp->quantity;
            }

            $data["sum"]=$sum;
            $data["products"]=$products;

            return $data;
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public static function Count(){
        $user=Auth::user();
        try{
           return Cart::where("user_id",$user->id)->count();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }


}
