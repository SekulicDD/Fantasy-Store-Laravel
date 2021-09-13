<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AdminMainCategoriesController extends Controller
{
    public function showMainCategories(){
        $data["columns"] = Schema::getColumnListing('main_categories');
        $perPage=8;
        try{
            $categories=MainCategory::paginate($perPage);
            $data["categories"]=$categories;
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        return view("admin.partials.mainCategories.mainCategories",$data);
    }

    public function getMainCategoryEdit(Request $request){
        try{
            $data["mainCategory"]=MainCategory::find($request->id);

            return view("admin.partials.mainCategories.mainCategoryEditModal",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function deleteMainCategory(Request $request){
        try{
            MainCategory::find($request->id)->delete();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function editMainCategory(Request $request){

        $serialized = $request->data;
        $data=array();
        parse_str($serialized,$data);

        $validator = Validator::make($data, [
            'name'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        try{
            $category=MainCategory::find($data["id"]);
            $category->name=$data["name"];
            $category->updated_at= date('Y-m-d H:i:s');
            $category->save();
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function insertMainCategory(Request $request){

        $serialized = $request->data;
        $data=array();
        parse_str($serialized,$data);

        $validator = Validator::make($data, [
            'name'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $serialized = $request->data;
        $data=array();
        parse_str($serialized,$data);

        try{
            $category=MainCategory::create([
                "name"=>$data["name"],
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


}
