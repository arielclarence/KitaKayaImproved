<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Service;
use App\Models\ThreadForum;
use App\Models\User;
use App\Models\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserVIPController extends Controller
{
    public function view(){
        return view('UserVip.home');
    }

    public function forum(){
        $videos = Video::all();


        return view('UserVip.listforum', [
            "videos" => $videos

        ]);
    }

    public function todetailforumvip(Request $request){

        $threads = ThreadForum::all()->where('Kategori',  $request->id);
        $video = Video::find($request->id);

        return view('UserVip.forum', [
            "threads" => $threads,
            "video" => $video
        ]);
    }

    public function rekomendasi(){
        $data  = DB::table('rekomendasi')->select('nama', 'keterangan')->get();

        return view('UserVip.rekomendasi', ["listSaham" => $data]);
    }

    public function history(){
        return view('UserVip.history');
    }

    public function cs(){

        $user = User::all()->where('nama', Session::get('nama'))->first();
        $services = Service::all()->where('member',  $user->id);

        return view('UserVip.cs', [
            "services" => $services

        ]);
    }
    public function todetailcsvip(Request $request){
        $service = Service::find($request->id);

        $chats = Chat::all()->where('service',  $service->id);
        return view('UserVip.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
}
