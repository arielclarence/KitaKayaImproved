<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Service;
use App\Models\Kategori;
use App\Models\Comment;
use App\Models\ThreadForum;
use App\Models\User;
use App\Models\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserVIPController extends Controller
{
    public function view(){
        $kategori = Kategori::all();

        return view('UserVip.home', [
            'kategori' => $kategori
        ]);
    }

    public function forum(){
        $videos = Video::all();


        return view('UserVip.listforum', [
            "videos" => $videos

        ]);
    }

    public function todetailforumvip(Request $request){

        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();
        // dd($comments);

        $idkategori=$request->id;

        return view('UserVip.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function toeditpostforumvip(Request $request){

        $thread = ThreadForum::find($request->id);
        return view('UserVip.editpost', [
            "thread" => $thread,
        ]);
    }
    public function toeditreplyforumvip(Request $request){

        $comment = Comment::find($request->id);

        $threadforum = ThreadForum::find($comment->thread);
        $idforum=$threadforum->kategori;
        return view('UserVip.editreply', [
            "comment" => $comment,
            "idforum" => $idforum
        ]);
    }
    public function editpostforumvip(Request $request){
        $rules = [
            'judul' => "required",
            "isi" => "required"

        ];
        $messages = [
            "required" => "attribute kosong",

        ];
        $request->validate($rules, $messages);

        $threadforum = ThreadForum::find($request->id);
        $idforum=$threadforum->kategori;

        $data = ThreadForum::find($request->id);
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();
        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($idforum);
        $comments = Comment::all();

        $idkategori=$request->id;

        return view('UserVip.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function editreplyforumvip(Request $request){
        $rules = [
            "isi" => "required"

        ];
        $messages = [
            "required" => "attribute kosong",

        ];
        $request->validate($rules, $messages);
        $data = Comment::find($request->id);
        $data->isi = $request->isi;
        $data->save();

        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();

        $idkategori=$request->id;

        return view('UserVip.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function addpostforumvip(Request $request){
        $rules = [
            'judul' => "required",
            "isi" => "required"

        ];
        $messages = [
            "required" => "attribute kosong",

        ];
        $request->validate($rules, $messages);
        $data = new ThreadForum();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->namamember = Session::get('nama');

        $data->kategori = $request->id;
        $data->save();


        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();

        $idkategori=$request->id;

        return view('UserVip.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function addreplyforumvip(Request $request){

        $rules = [
            "isi" => "required"

        ];
        $messages = [
            "required" => "attribute kosong",

        ];

        $request->validate($rules, $messages);
        $threadforum = ThreadForum::find($request->id);
        $idforum=$threadforum->kategori;
        $data = new Comment();
        $data->thread = $request->id;
        $data->namamember = Session::get('nama');

        $data->isi = $request->isi;

        $data->save();

        $threads = ThreadForum::all()->where('kategori',  $idforum);
        $video = Video::find($idforum);
        $comments = Comment::all();


        $idkategori=$idforum;

        return view('UserVip.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function addreplycommentforumvip(Request $request){

        $rules = [
            "isi" => "required"

        ];
        $messages = [
            "required" => "attribute kosong",

        ];

        $request->validate($rules, $messages);
        $comment = Comment::find($request->id);
        $threadforum = ThreadForum::find($comment->thread);
        $idforum=$threadforum->kategori;



        $data = new Comment();
        $data->thread = $idforum;
        $data->namamember = Session::get('nama');

        $data->isi = $request->isi;

        $data->save();

        $threads = ThreadForum::all()->where('kategori',  $idforum);
        $video = Video::find($idforum);
        $comments = Comment::all();

        $idkategori=$idforum;

        return view('UserVip.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);


    }



    public function rekomendasi(){
        $data  = DB::table('rekomendasi')->select('nama', 'keterangan')->get();

        return view('UserVip.rekomendasi', ["listSaham" => $data]);
    }

    public function changePass(Request $request){
        $passlama = $request->input('passlama');
        $passbaru = $request->input('passbaru');
        $conpass = $request->input('conpass');

        if ($passlama == "" || $passbaru == "" || $conpass == "") {
            Alert::error('Error', 'Tidak boleh ada yang kosong!');
        }
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

    public function finishservicevip(Request $request){


        $data = Service::find($request->id);
        $data->status = 1;
        $data->save();
        $user = User::all()->where('nama', Session::get('nama'))->first();
        $services = Service::all()->where('member',  $user->id);


        return view('UserVip.cs', [
            "services" => $services

        ]);


    }
    public function rateservicevip(Request $request){


        $data = Service::find($request->id);
        $data->rate = $request->rate;
        $data->save();

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
    public function addpertanyaanvip(Request $request){
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

        return view('UserVip.cs', [
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
        return view('UserVip.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
}
