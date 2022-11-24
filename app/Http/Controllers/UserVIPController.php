<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserVIPController extends Controller
{
    public function view(){
        return view('UserVip.home');
    }

    public function forum(){
        return view('UserVip.forum');
    }

    public function rekomendasi(){
        $data  = DB::table('rekomendasi')->select('nama', 'keterangan')->get();

        return view('UserVip.rekomendasi', ["listSaham" => $data]);
    }

    public function history(){
        return view('UserVip.history');
    }

    public function cs(){
        return view('UserBiasa.cs');
    }
}
