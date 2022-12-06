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
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Midtrans\CreateSnapTokenService2;
use App\Services\Midtrans\CreateSnapTokenService3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserBiasaController extends Controller
{
    //
    public function view(){
        $kategori = DB::select("SELECT * FROM KATEGORI_VID LIMIT 3");

        return view('UserBiasa.home', [
            'kategori' => $kategori
        ]);
    }

    //finish
    public function viewHalamanUpgrade(){
        $namaLogin = Session::get("nama", "Saya");
        $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->first();
        DB::update('update user set role = ? where id = ?', ["1" ,  $ambilIdMember->id]);

        $transaksi = new Transaksi();
        $transaksi->nama = $namaLogin;
        $transaksi->id_member = $ambilIdMember->id;
        $transaksi->bulan = "1";
        $transaksi->subtotal = "120000";
        $transaksi->status = "0";

        $midtrans = new CreateSnapTokenService($transaksi);
        $snapToken = $midtrans->getSnapToken();

        $transaksi->snap_token = $snapToken;
        $transaksi->save();

        // DB::update('update user set role = ? where id = ?', [$ambilIdMember->role ,  $ambilIdMember->id]);

        return view('UserBiasa.halamanupgrade', compact('snapToken'));
    }

    public function viewHalamanUpgrade2(){
        $namaLogin = Session::get("nama", "Saya");
        $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->first();
        DB::update('update user set role = ? where id = ?', ["1" ,  $ambilIdMember->id]);

        $transaksi = new Transaksi();
        $transaksi->nama = $namaLogin;
        $transaksi->id_member = $ambilIdMember->id;
        $transaksi->bulan = "6";
        $transaksi->subtotal = "500000";
        $transaksi->status = "0";

        $midtrans = new CreateSnapTokenService2($transaksi);
        $snapToken = $midtrans->getSnapToken();

        $transaksi->snap_token = $snapToken;
        $transaksi->save();

        // DB::update('update user set role = ? where id = ?', [$ambilIdMember->role ,  $ambilIdMember->id]);

        return view('UserBiasa.halamanupgrade', compact('snapToken'));
    }

    public function viewHalamanUpgrade3(){
        $namaLogin = Session::get("nama", "Saya");
        $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->first();
        DB::update('update user set role = ? where id = ?', ["1" ,  $ambilIdMember->id]);

        $transaksi = new Transaksi();
        $transaksi->nama = $namaLogin;
        $transaksi->id_member = $ambilIdMember->id;
        $transaksi->bulan = "12";
        $transaksi->subtotal = "1100000";
        $transaksi->status = "0";

        $midtrans = new CreateSnapTokenService3($transaksi);
        $snapToken = $midtrans->getSnapToken();

        $transaksi->snap_token = $snapToken;
        $transaksi->save();

        // DB::update('update user set role = ? where id = ?', [$ambilIdMember->role ,  $ambilIdMember->id]);

        return view('UserBiasa.halamanupgrade', compact('snapToken'));
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
        $namaLogin = Session::get("nama", "Saya");
        $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->get();
        return view('UserBiasa.profile',[
            "data_user" => $ambilIdMember
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

    //detail thread forum
    public function toDetailThreadForum($id)
    {
        $thread_forum = ThreadForum::find($id);
        $comments = Comment::where('thread','=',$id)->get();

        return view('UserBiasa.threadDetail', [
            'thread' =>$thread_forum,
            'comments' => $comments
        ]);
    }

    //add comment on detail thread forum
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


        $threads = ThreadForum::all()->where('kategori',  $data->kategori);
        $video = Video::find($data->kategori);
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

        $threadforum = ThreadForum::all()->where('id',  $data->thread)->first();
        $threads = ThreadForum::all()->where('kategori',  $threadforum->kategori);

        $video = Video::find($threadforum->kategori);
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
        $namaLogin = Session::get("nama", "Saya");
        $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->first();
        $listHistory = DB::table('transaksi')->where('id_member', $ambilIdMember)->get();
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
