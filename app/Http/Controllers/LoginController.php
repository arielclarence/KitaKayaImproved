<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function login(Request $request){
        $in = $request->validate([
            "username" => ["required", "email:dns"],
            "pass" => ["required"],
        ]);

        $ceklogin = Auth::attempt(["email" => $in['username'], "password" => $in["pass"]]);

        if ($ceklogin == true) {
            Session::put("idUser", $in['username']);
            $user = DB::table('user')->where("email","=",$in['username'])->first();

            if ($user->role == "0") {
                // if ($user->email_verified_at == null) {
                //     # code...
                //     Alert::error('Email', 'Email Belum Terverifikasi!');
                //     return redirect()->back();
                // }
                Session::put("nama", $user->nama);
                Session::put("pass", $user->password);
                return redirect('/userBiasa/video');
            }else if ($user->role == "1") {
                // if ($user->email_verified_at == null) {
                //     # code...
                //     Alert::error('Email', 'Email Belum Terverifikasi!');
                //     return redirect()->back();
                // }
                Session::put("nama", $user->nama);
                Session::put("pass", $user->password);
                return redirect('/userVip/video');
            }


        }else if ($request->input("username") == "KITAKAYA@gmail.com" && $request->input("pass") == "000"){
            Session::put("idAdmin", "KITAKAYA@GMAIL.COM");
            return view("Admin.home");
        }else if ($request->input("username") == "csKITAKAYA@gmail.com" && $request->input("pass") == "cs"){
            Session::put("idCs", "csKITAKAYA@GMAIL.COM");
            return redirect('/cs/listcs');
        }
        else{
            return redirect()->back()->with("error", "Gagal Login!");
        }
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
            "umur" => ["required"],
            "cb" => ["required"]
        ]);

        $result = User::create([
            "email" => $in["email"],
            "password" => password_hash($in["pass"], PASSWORD_DEFAULT),
            "nama" => $in["nama"],
            "umur" => $in["umur"],
            "role" => 0,
            "status" => 1
        ]);

        // $result = new User();
        // $result->nama = $request->nama;
        // $result->email = $request->email;
        // $result->password = $request->pass;
        // $result->umur = $request->umur;
        // $result->role = 1;
        // $result->status = 1;
        // $result->exp = 0;
        // $result->save();

        event(new Registered($result));

        $result->sendEmailVerificationNotification();

        // Auth::login($result);

        return redirect(url("/email/verify"))->with("email",$in["email"]);
    }

    public function verifyemail(EmailVerificationRequest $r){
        $r->fulfill();

        $link = url("/");
        return response()->view("Email.done")->withHeaders(["Refresh"=>"4;url=$link"]);
    }

    public function logout(){
        Session::forget("idUser");
        return redirect("/");
    }

    public function goback(Request $r){
        Auth::logout();

        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect("/");
    }
}
