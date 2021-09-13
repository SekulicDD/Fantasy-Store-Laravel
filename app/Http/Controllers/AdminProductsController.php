<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AdminProductsController extends Controller
{
    public function showProducts(){
        $data["columns"] = Schema::getColumnListing('products');
        $perPage=8;
        try{
            $products=Product::paginate($perPage);
            $data["products"]=$products;
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        return view("admin.partials.products.products",$data);
    }

    public function getProductEdit(Request $request){
        try{
            $data["product"]=Product::find($request->id);
            $data["categories"]=Category::all();

            return view("admin.partials.products.productEditModal",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }


    public function deleteProduct(Request $request){
        try{
            Product::find($request->id)->delete();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function editProduct(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'price'=>'required|numeric|between:1,999999.99',
            'description'=>'required|max:400',
            'category'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        try{

            if($request->file('file')){
                $validator= Validator::make($request->all(), [
                    'file' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                if ($validator->fails()) {
                    return response()->json($validator->messages());
                }

                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();

                $path = $request->file('file')->storeAs('uploads', $imageName, 'public');

                $image=Image::create([
                    "name"=>$imageName,
                    "path"=>'/storage/'.$path
                ]);
            }

            $product=Product::find($request->id);
            if(!empty($image))
                $product->image_id=$image->id;
            $product->name=$request->name;
            $product->price=(float)$request->price;
            $product->description=$request->description;
            $product->category_id=(int)$request->category;
            $product->updated_at= date('Y-m-d H:i:s');
            $product->save();


        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function insertProduct(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'price'=>'required|numeric|between:1,999999.99',
            'description'=>'required|max:400',
            'category'=>'required',
            'file' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }


        try{
            $image=Image::find(1);

            if($request->file('file')){
                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();

                $path = $request->file('file')->storeAs('uploads', $imageName, 'public');

                $image=Image::create([
                    "name"=>$imageName,
                    "path"=>'/storage/'.$path
                ]);
            }

            Product::create([
                "name"=>$request->name,
                "price"=>$request->price,
                "description"=>$request->description,
                "category_id"=>$request->category,
                "image_id"=>$image->id
            ]);


        }

        catch (\Exception $e){
            return $e->getMessage();
            Log::error($e->getMessage());
            abort(500);
        }
    }


    public function getInsertForm(){
        try {
            $data["categories"] = Category::all();
            return view("admin.partials.products.productInsertForm",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

    }


}
