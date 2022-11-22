<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function view(){
        return view('Admin.home');
    }

    public function addVideo(Request $request){
        $kategori = $request->input('kategorivideo');
        $judul = $request->input('judulvideo');
        $link= $request->input('linkvideo');
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
