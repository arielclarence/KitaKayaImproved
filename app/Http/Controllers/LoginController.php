<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginController extends Controller
{
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
}
