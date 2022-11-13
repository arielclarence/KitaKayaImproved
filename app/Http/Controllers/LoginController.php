<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login(){
        return view('Login');
    }

    public function register(){
        return view('register');
    }

    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function transaksi(){
        return view('transaksi');
    }

    public function cart(){
        return view('cart');
    }

    public function history(){
        return view('history');
    }
}
