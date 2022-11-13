<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin(){
        return view('admin');
    }

    public function listseller(){
        return view('adminlistseller');
    }
    public function listmember(){
        return view('adminlistmember');
    }
}
