<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function showLog(Request $request){

        if($request->date)
            $tmpDate=$request->date;
        else
            $tmpDate=date("Y-m-d");

        $filePath=storage_path("logs\laravel-".$tmpDate.".log");

        $fileDates = [];
        $files = \File::allFiles(storage_path("logs"));
        foreach($files as $file) {
            array_push($fileDates,substr(pathinfo($file)['filename'],8));
        }

        $data["dates"]=$fileDates;

        if(File::exists($filePath)){
            $data["file"]=file::lines($filePath)->reverse();
       }



        return view("admin.pages.logsPage",$data);
    }
}
