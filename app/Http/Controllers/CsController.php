<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CsController extends Controller
{

    public function listcs(){

        $services = Service::all();

        return view('CustomerService.home', [
            "services" => $services

        ]);
    }
    public function historycs(){

        $services = Service::all();
        return view('CustomerService.history', [
            "services" => $services

        ]);
    }


    public function todetailcscs(Request $request){
        $service = Service::find($request->id);

        $chats = Chat::all()->where('service',  $service->id);
        return view('UserVip.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
    public function addchatcs(Request $request){
        $service = Service::find($request->id);
        $data = new Chat();
        $data->service =$request->id;

        $data->pengirim =0;

        $data->isi = $request->isichat;

        $data->save();

        $chats = Chat::all()->where('service',  $service->id);
        return view('UserVip.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
    public function forum(){
        return view('CustomerService.forum');
    }
}
