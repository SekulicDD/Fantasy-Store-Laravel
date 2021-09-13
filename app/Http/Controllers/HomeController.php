<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class HomeController extends OsnovniController
{
    public function index(){

        try{
            $this->data["products"] = Product::with('categories')->limit(8)->get();
        }

        catch (\Exception $e){
            dd($e->getMessage());
            Log::error($e->getMessage());
            abort(500);
        }

        return view('user.pages.home', $this->data);
    }

    public function getModal(Request $request){
        try{
            $this->data["modal"] = Product::all()->find($request->id);
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
        return view('user.partials.modal', $this->data);
    }

    public function author(){
        return view('user.pages.author',$this->data);
    }

}
