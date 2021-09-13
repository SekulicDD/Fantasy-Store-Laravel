<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AdminCategoriesController extends Controller
{
    public function showCategories(){
        $data["columns"] = Schema::getColumnListing('categories');
        $perPage=8;
        try{
            $categories=Category::paginate($perPage);
            $data["categories"]=$categories;
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        return view("admin.partials.categories.categories",$data);
    }

    public function getCategoryEdit(Request $request){
        try{
            $data["category"]=Category::find($request->id);
            $data["mainCategories"]=MainCategory::all();

            return view("admin.partials.categories.categoryEditModal",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function deleteCategory(Request $request){
        try{
            Category::find($request->id)->delete();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function editCategory(Request $request){

        $serialized = $request->data;
        $data=array();
        parse_str($serialized,$data);

        $validator = Validator::make($data, [
            'name'=>'required',
            "category"=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        try{
            $category=Category::find($data["id"]);
            $category->name=$data["name"];
            $category->main_category_id=(int)$data["category"];
            $category->updated_at= date('Y-m-d H:i:s');
            $category->save();
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function insertCategory(Request $request){
        $serialized = $request->data;
        $data=array();
        parse_str($serialized,$data);

        $validator = Validator::make($data, [
            'name'=>'required',
            "category"=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        try{
            $category=Category::create([
                "name"=>$data["name"],
                "main_category_id"=>(int)$data["category"],
                "created_at"=>date('Y-m-d H:i:s')
            ]);
            $category->save();

        }

        catch (\Exception $e){
            //return $e->getMessage();
            Log::error($e->getMessage());
            abort(500);
        }
    }


    public function getInsertForm(){
        try {
            $data["categories"] = Category::all();
            return view("admin.partials.categories.categoryInsertForm",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

    }



}
