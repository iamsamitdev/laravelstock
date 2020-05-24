<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function blank(){
        return view('backend.pages.blank');
    }

    public function login(){
        return view('backend.pages.login');
    }

    public function register(){
        return view('backend.pages.register');
    }

    public function forgotpass(){
        return view('backend.pages.forgotpass');
    }
}
