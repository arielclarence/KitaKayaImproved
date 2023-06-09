<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Service;
use App\Models\Kategori;
use App\Models\Comment;
use App\Models\ThreadForum;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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

    //detail thread forum
    public function toDetailThreadForum($id)
    {
        $thread_forum = ThreadForum::find($id);
        $comments = Comment::where('thread','=',$id)->get();

        return view('UserVip.threadDetail', [
            'thread' =>$thread_forum,
            'comments' => $comments
        ]);
    }
    public function addDetailThreadForumComment(Request $request)
    {
        # code...
        $isi = $request->isi;
        $nama =  Session::get('nama');
        $threadId = $request->input('thread-id');

        $new = new Comment();
        $new->thread = $threadId;
        $new->namamember = $nama;
        $new->isi = $isi;
        $new->reply = 0;
        $new->unsend = 0;
        $new->save();

        $userId = Session::get("idUser");
        $user = User::where('email','=', $userId)->first();
        $exp = $user->exp;
        $user->exp = $exp + 10;
        $user->save();

        return back();
    }

    public function todetailforumvip(Request $request){

        $threads = ThreadForum::all()->where('kategori',  $request->id);
        $video = Video::find($request->id);
        $comments = Comment::all();

        $idkategori=$request->id;

        // $threads = ThreadForum::all()->where('kategori',  $request->id);
        // $video = Video::find($request->id);
        // $comments = Comment::all();
        // // dd($comments);

        // $idkategori=$request->id;

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


        $threads = ThreadForum::all()->where('kategori',  $data->kategori);
        $video = Video::find($data->kategori);
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

        $threadforum = ThreadForum::all()->where('id',  $data->thread)->first();
        $threads = ThreadForum::all()->where('kategori',  $threadforum->kategori);

        $video = Video::find($threadforum->kategori);
        $comments = Comment::all();

        $idkategori=$request->id;

        // return view('UserVip.forum', [
        //     "threads" => $threads,
        //     "video" => $video,
        //     "idkategori" => $idkategori,
        //     "comments" => $comments

        // ]);


        // $links = session()->has('links') ? session('links') : [];
        // $currentLink = request()->path(); // Getting current URI like 'category/books/' array_unshift($links, $currentLink); // Putting it in the beginning of links array session(['links' => $links]); // Saving links array to the session
        // return redirect(session('links')[2]);


        // return Redirect::to($request->request->get('http_referrer'));

        return redirect("userVip/forum/$threadforum->id/detail");

        // return view('UserVip.threadDetail', [
        //     'thread' =>$threads,
        //     'comments' => $comments
        // ]);
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

        $oldpass = Session::get("pass", "Saya");

        if ($passlama == "" || $passbaru == "" || $conpass == "") {
            Alert::error('Error', 'Tidak boleh ada yang kosong!');
            return redirect()->back();
        }
        else if (!Hash::check($passlama, $oldpass)){
            Alert::error('Error', 'Password Lama Salah');
            return redirect()->back();
        }
        else if ($passbaru != $conpass){
            Alert::error('Error', 'Password baru tidak sama dengan Confirm Password!');
            return redirect()->back();
        } else{
            $result = DB::update('update user set password = ? where password = ?', [password_hash($passbaru, PASSWORD_DEFAULT) , $oldpass]);

            if ($result) {
                Alert::success('Success', 'Berhasil Update Password!');
                return redirect()->back();
            }
            else{
                Alert::error('Error', 'Gagal Update Password!');
                return redirect()->back();
            }
        }
    }

    public function todetailuser(){
        // $namaLogin = Session::get("nama", "Saya");
        // $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->get();

        $user = User::where('email','=',Session::get('idUser'))->first();
        return view('UserVip.profile',[
            "d" => $user
        ]);
    }

    public function history(){
        $namaLogin = Session::get("nama", "Saya");
        $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->first();
        $listHistory = DB::table('transaksi')->where('id_member', $ambilIdMember->id)->get();
        return view('UserVip.history',[
            'listHistory' => $listHistory
        ]);
    }

    public function filterTanggalVip(Request $request)
    {
        $dateawal = $request->input("dateawalvip");
        $dateakhir = $request->input("dateakhirvip");
        // $listHistory = DB::select("select * from transaksi where created_at >= $dateawal and created_at <= $dateakhir");
        $listHistory = Transaksi::Where('created_at', '>=', $dateawal)->where('created_at', '<=', $dateakhir)->get();
        // dd($listHistory);
        return view('UserVip.history',[
            'listHistory' => $listHistory
        ]);
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
        if ($request->rate==null) {
            $user = User::all()->where('nama', Session::get('nama'))->first();
            $services = Service::all()->where('member',  $user->id);


            return view('UserVip.cs', [
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


            return view('UserVip.cs', [
                "services" => $services

            ]);
        }



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
    public function unsendchatvip(Request $request){

        $data = Chat::find($request->id);
        $data->unsend =1;
        $data->save();
        $service = Service::find($data->service);

        $chats = Chat::all()->where('service',  $data->service);
        return view('UserVip.chat', [
            "service" => $service,
            "chats" => $chats
        ]);
    }
}
