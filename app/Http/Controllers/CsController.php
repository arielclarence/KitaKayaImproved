<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Comment;
use App\Models\Service;
use App\Models\ThreadForum;
use App\Models\User;
use App\Models\Video;
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
        return view('CustomerService.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }

    public function addchatcs(Request $request){
        $service = Service::find($request->id);
        $data = new Chat();
        $data->service =$request->id;

        $data->pengirim =1;

        $data->isi = $request->isichat;
        $data->save();

        $chats = Chat::all()->where('service',  $service->id);
        return view('CustomerService.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
    public function forum(){
        $videos = Video::all();

        return view('CustomerService.listforum', [
            "videos" => $videos
        ]);
    }
    public function todetailforumcs(Request $request){

        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();
        // dd($comments);

        $idkategori=$request->id;

        return view('CustomerService.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }

    public function toeditpostforumcs(Request $request){

        $thread = ThreadForum::find($request->id);
        return view('CustomerService.editpost', [
            "thread" => $thread,
        ]);
    }
    public function toeditreplyforumcs(Request $request){

        $comment = Comment::find($request->id);

        $threadforum = ThreadForum::find($comment->thread);
        $idforum=$threadforum->kategori;
        return view('CustomerService.editreply', [
            "comment" => $comment,
            "idforum" => $idforum
        ]);
    }
    public function editpostforumcs(Request $request){
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



        $threads = ThreadForum::all()->where('kategori', $idforum);
        $video = Video::find($idforum);
        $comments = Comment::all();
        $idkategori=$request->id;

        return view('CustomerService.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function editreplyforumcs(Request $request){
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
        $threadforum = ThreadForum::find($data->thread);

        $threads = ThreadForum::all()->where('kategori',  $threadforum->kategori);
        $video = Video::find($threadforum->kategori);
        $comments = Comment::all();

        $idkategori=$request->id;

        return view('CustomerService.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function addpostforumcs(Request $request){
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
        $data->namamember = "Customer Service";

        $data->kategori = $request->id;
        $data->save();


        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();

        $idkategori=$request->id;

        return view('CustomerService.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function addreplyforumcs(Request $request){

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
        $data->namamember = "Customer Service";

        $data->isi = $request->isi;

        $data->save();

        $threads = ThreadForum::all()->where('kategori',  $idforum);
        $video = Video::find($idforum);
        $comments = Comment::all();


        $idkategori=$idforum;

        return view('CustomerService.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);
    }
    public function addreplycommentforumcs(Request $request){

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
        $data->namamember = "Customer Service";

        $data->isi = $request->isi;

        $data->save();

        $threads = ThreadForum::all()->where('kategori',  $idforum);
        $video = Video::find($idforum);
        $comments = Comment::all();

        $idkategori=$idforum;

        return view('CustomerService.forum', [
            "threads" => $threads,
            "video" => $video,
            "idkategori" => $idkategori,
            "comments" => $comments

        ]);


    }

}
