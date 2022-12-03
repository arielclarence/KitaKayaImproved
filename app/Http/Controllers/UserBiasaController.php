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

class UserBiasaController extends Controller
{
    public function view(){
        $kategori = DB::select("SELECT * FROM KATEGORI_VID LIMIT 3");

        return view('UserBiasa.home', [
            'kategori' => $kategori
        ]);
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
    public function addchat(Request $request){
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
        $videos = Video::all();

        return view('UserBiasa.listforum', [
            "videos" => $videos
        ]);
    }

    public function todetailforumbiasa(Request $request){

        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();

        $idkategori=$request->id;

        return view('UserBiasa.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }

    public function toeditpostforumbiasa(Request $request){

        $thread = ThreadForum::find($request->id);
        return view('UserBiasa.editpost', [
            "thread" => $thread,
        ]);
    }

    public function toeditreplyforumbiasa(Request $request){

        $comment = Comment::find($request->id);

        $threadforum = ThreadForum::find($comment->thread);
        $idforum=$threadforum->kategori;
        return view('UserBiasa.editreply', [
            "comment" => $comment,
            "idforum" => $idforum
        ]);
    }

    public function editpostforumBiasa(Request $request){
        $rules = [
            'judul' => "required",
            "isi" => "required"

        ];
        $messages = [
            "required" => "attribute kosong",

        ];
        $request->validate($rules, $messages);
        $data = ThreadForum::find($request->id);
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();
        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();

        $idkategori=$request->id;

        return view('UserBiasa.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }

    public function editreplyforumbiasa(Request $request){
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

        return view('UserBiasa.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }

    public function addpostforumbiasa(Request $request){
        // dd($request);

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
        // dd($comments);

        $idkategori=$request->id;

        return view('UserBiasa.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }

    public function addreplyforumbiasa(Request $request){

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

        return view('UserBiasa.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }

    public function addreplycommentforumbiasa(Request $request){

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
        $comments = Comment::all()->where('thread',  $idforum);

        $idkategori=$idforum;

        return view('UserBiasa.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }

    public function upgrade(){
        return view('UserBiasa.upgrade');
    }

    public function history(){
        $listHistory = DB::table('transaksi')->get();
        return view('UserBiasa.history', [
            "listHistory" => $listHistory
        ]);
    }

    public function cs(){
        $user = User::all()->where('nama', Session::get('nama'))->first();
        $services = Service::all()->where('member',  $user->id);

        return view('UserBiasa.cs', [
            "services" => $services

        ]);
    }

    public function rateservicebiasa(Request $request){
        if ($request->rate==null) {
            $user = User::all()->where('nama', Session::get('nama'))->first();
            $services = Service::all()->where('member',  $user->id);


            return view('UserBiasa.cs', [
                "services" => $services

            ]);
        }
        else {
            $rules = [
                "rate" => "required"

            ];
            $messages = [
                "required" => "attribute kosong",

            ];
            $request->validate($rules, $messages);
            $data = Service::find($request->id);
            $data->rate = $request->rate;
            $data->save();

            $user = User::all()->where('nama', Session::get('nama'))->first();
            $services = Service::all()->where('member',  $user->id);


            return view('UserBiasa.cs', [
                "services" => $services

            ]);
        }



    }
    public function finishservicebiasa(Request $request){


        $data = Service::find($request->id);
        $data->status = 1;
        $data->save();
        $user = User::all()->where('nama', Session::get('nama'))->first();
        $services = Service::all()->where('member',  $user->id);


        return view('UserBiasa.cs', [
            "services" => $services

        ]);


    }
    public function unsendchatbiasa(Request $request){

        $data = Chat::find($request->id);
        $data->unsend =1;
        $data->save();
        $service = Service::find($data->service);

        $chats = Chat::all()->where('service',  $data->service);
        return view('UserBiasa.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
}
