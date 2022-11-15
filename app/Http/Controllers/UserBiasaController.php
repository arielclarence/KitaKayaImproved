<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserBiasaController extends Controller
{
    public function view(){
        return view('UserBiasa.home');
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
