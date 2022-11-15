<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view(){
        return view('Admin.home');
    }

    public function listvideo(){
        return view('Admin.listvideo');
    }

    public function chart(){
        return view('Admin.addchart');
    }

    public function validasi(){
        return view('Admin.validasipembayaran');
    }

    public function chartperkembangan(){
        return view('Admin.chartperkembangan');
    }

    public function chartumur(){
        return view('Admin.chartumur');
    }
}
