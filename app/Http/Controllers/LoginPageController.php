<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPageController extends OsnovniController
{
    public function index(){
        return view('user.pages.login', $this->data);
    }
}
