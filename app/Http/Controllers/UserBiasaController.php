<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserBiasaController extends Controller
{
    public function view(){
        return view('UserBiasa.home');
    }
    public function todetailcs(Request $request){
        $service = Service::find($request->id);

        $chats = Chat::all()->where('service',  $service->id);
        return view('UserBiasa.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
    public function addpertanyaan(Request $request){
        $rules = [
            "isi" => "required"

        ];
        $messages = [
            "required" => "attribute kosong",

        ];
        $request->validate($rules, $messages);
        $user = User::all()->where('nama', Session::get('nama'))->first();

        $data = new Service();
        $data->judul =$request->isi;

        $data->member =$user->id;

        $data->rate =0;
        $data->save();

        $services = Service::all()->where('member',  $user->id);

        return view('UserBiasa.cs', [
            "services" => $services

        ]);
    }
    public function addchatvip(Request $request){
        $service = Service::find($request->id);
        $data = new Chat();
        $data->service =$request->id;

        $data->pengirim =0;

        $data->isi = $request->isichat;

        $data->save();

        $chats = Chat::all()->where('service',  $service->id);
        return view('UserBiasa.chat', [
            "service" => $service,
            "chats" => $chats
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
        $user = User::all()->where('nama', Session::get('nama'))->first();
        $services = Service::all()->where('member',  $user->id);

        return view('UserBiasa.cs', [
            "services" => $services

        ]);
    }
}
