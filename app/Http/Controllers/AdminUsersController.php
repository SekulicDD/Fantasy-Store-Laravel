<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{
    public function showUsers(){
        $data["columns"] = Schema::getColumnListing('users');
        $perPage=8;
        try{
            $users=User::paginate($perPage);
            $data["users"]=$users;
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }

        return view("admin.partials.users.users",$data);
    }

    public function getUserEdit(Request $request){

        try{
            $data["user"]=User::find($request->id);
            $data["roles"]=Role::all();

            return view("admin.partials.users.userEditModal",$data);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }


    public function deleteUser(Request $request){
        try{
            User::find($request->id)->delete();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function editUser(Request $request){

        $serialized = $request->data;
        $data=array();
        parse_str($serialized,$data);

        $validator = Validator::make($data, [
            'password'=>'required',
            'id'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }


        try{
            $user=User::find($data["id"]);

            if($data["password"]!=null){
                $data["password"] = Hash::make($data["password"]);
                $user->password=$data["password"];
            }

            $user->role_id=(int)$data["role"];
            $user->updated_at= date('Y-m-d H:i:s');
            $user->save();
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public static function Count(){
        try{
            return User::count();
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }

}
