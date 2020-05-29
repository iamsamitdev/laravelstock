<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard(){
        return view('backend.pages.dashboard');
    }

    public function blank(){
        return view('backend.pages.blank');
    }

    public function logout(){
        return redirect('login');
    }

}
