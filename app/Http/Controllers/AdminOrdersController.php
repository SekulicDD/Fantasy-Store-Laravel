<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AdminOrdersController extends Controller
{
    public function showOrders(){
        $data["columns"] = Schema::getColumnListing('orders');
        $perPage=8;
        try{
            $orders=Order::paginate($perPage);
            $data["orders"]=$orders;
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        return view("admin.partials.orders.orders",$data);
    }

    public function deleteOrder(Request $request){
        try{
            Order::find($request->id)->delete();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function getOrderEdit(Request $request){
        try{
            $data["order"]=Order::find($request->id);

            return view("admin.partials.orders.orderEditModal",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function editOrder(Request $request)
    {

        $serialized = $request->data;
        $data=array();
        parse_str($serialized,$data);

        $validator = Validator::make($data, [
            'address' => 'required',
            'total' => 'required|numeric|between:1,999999.99',
            'phone' => 'required|max:400',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }


        try {
            $order = Order::find($data["id"]);
            $order->address = $data["address"];
            $order->total = (float)$data["total"];
            $order->phone = $data["phone"];
            $order->updated_at = date('Y-m-d H:i:s');
            $order->save();

        }
        catch (\Exception $e){

            Log::error($e->getMessage());
            abort(500);
        }
    }
}
