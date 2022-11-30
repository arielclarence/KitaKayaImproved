<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserBiasaController extends Controller
{
    public function view(){
        $kategori = DB::select("SELECT * FROM KATEGORI_VID LIMIT 3");

        return view('UserBiasa.home', [
            'kategori' => $kategori
        ]);
    }

    public function forum(){
        return view('UserBiasa.forum');
    }

    public function upgrade(){
        return view('UserBiasa.upgrade');
    }

    public function history(){
        return view('UserBiasa.history');
    }

    public function cs(){
        return view('UserBiasa.cs');
    }
}
