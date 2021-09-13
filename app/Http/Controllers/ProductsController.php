<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends OsnovniController
{
    public function index(){

        try {
            $this->data["mainCategories"] = MainCategory::all();
            $this->data["categories"] = Category::all();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        return view('user.pages.products', $this->data);
    }

    public function getOneProduct(Request $request){
        try {
            $product=Product::where("id",$request->id)->first();
            $this->data["product"] = $product;

            if($product) {
                $category=Category::select("name")->where("id",$product->category_id)->first();
                $this->data["category"]=$category;
            }
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        return view('user.pages.details', $this->data);
    }

    public function showProducts(Request $request){

        $order="name";
        $direction="asc";
        $perPage=8;
        $sliderStart=0;
        $sliderEnd=1000;

        if($request->slider){
            $value=$request->slider;
            $sliderStart=$value[0];
            $sliderEnd=$value[1];
        }

        if($request->order!=null){
            switch ($request->order){
                case 1: $order="name"; $direction="asc"; break;
                case 2: $order="name"; $direction="desc"; break;
                case 3: $order="price"; $direction="asc"; break;
                case 4: $order="price"; $direction="desc"; break;
            }
        }

        try {
            if($request->search==null) {
                if ($request->id == null) {
                    $products = Product::whereBetween('price',[$sliderStart,$sliderEnd])->orderBy($order, $direction)->paginate( $perPage);
                    //dd($request);
                } else {
                    $products = Product::whereBetween('price',[$sliderStart,$sliderEnd])->where("category_id", '=', $request->id)->orderBy($order, $direction)->paginate( $perPage);
                }
            }
            else{
                $word=$request->search;
                if ($request->id == null) {
                    $products = Product::whereBetween('price',[$sliderStart,$sliderEnd])->where("name","like","%".$word."%")->orderBy($order, $direction)->paginate( $perPage);
                    // dd($products);
                } else {
                    $products = Product::whereBetween('price',[$sliderStart,$sliderEnd])->where("category_id", '=', $request->id)->where("name","like","%".$word."%")->orderBy($order, $direction)->paginate( $perPage);
                }

            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        $products->appends(request()->input());
        $this->data["products"]=$products;
        return view('user.partials.products', $this->data);
    }

}
