<?php

namespace App\Http\Controllers;


use App\Models\NavMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OsnovniController extends Controller
{
    public $data;

    public function __construct()
    {
        try{
            $this->data["menu"] = NavMenu::getMenu();
        }

        catch (\Exception $e){
            Log::error($e->getMessage());
            abort(500);
        }
    }
}
