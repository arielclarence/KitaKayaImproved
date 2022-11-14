<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginController extends Controller
{
    public function login(Request $request){
        $in = $request->validate([
            "username" => ["required"],
            "pass" => ["required"],
        ]);

        $user = User::where('email', $in['username'])->where('password', $in['pass'])->first();
        Session::put("idUser", $user->idUser);

        return view("UserBiasa.home", ["dataUser" => $user, "nama" => $user->nama]);
    }


    public function regis(){
        return view('Register');
    }

    public function Register(Request $request){
        $in = $request->validate([
            "email" => ["required"],
            "pass" => ["required"],
            "connpass" => ["required", "same:pass"],
            "nama" => ["required"],
            "umur" => ["required"]
        ]);

        $result = User::create([
            "email" => $in["email"],
            "password" => $in["pass"],
            "nama" => $in["nama"],
            "umur" => $in["umur"],
            "role" => 0,
            "status" => 1
        ]);

        if($result){
            return redirect()->back()->with("success", "Berhasil Register!");
        }else{
            return redirect()->back()->with("error", "Gagal register!");
        }
    }

    public function logout(){
        Session::forget("idUser");
        return redirect()->route("login");
    }
}
