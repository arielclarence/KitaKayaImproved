<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserVIPController extends Controller
{
    public function view(){
        return view('UserVip.home');
    }

    public function forum(){
        return view('UserVip.forum');
    }

    public function rekomendasi(){
        return view('UserVip.rekomendasi');
    }

    public function history(){
        return view('UserVip.history');
    }

    public function cs(){
        return view('UserBiasa.cs');
    }
}
