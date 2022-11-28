<?php

namespace App\Http\Controllers;

use App\Models\ThreadForum;
use App\Models\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('UserVip.forum', [
            "threads" => $threads

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
        return view('UserBiasa.cs');
    }
}
