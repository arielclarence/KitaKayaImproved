<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsController extends Controller
{
    public function chat(){
        return view('CustomerService.home');
    }

    public function forum(){
        return view('CustomerService.forum');
    }
}
