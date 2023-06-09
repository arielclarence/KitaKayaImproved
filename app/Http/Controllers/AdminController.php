<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view(){
        return view('Admin.home');
    }

    public function addVideo(Request $request){
        $kategori = $request->input('kategorivideo');
        $judul = $request->input('judulvideo');
        $link= $request->input('linkvideo');
    }

    public function listvideo(){
        $kategori = Kategori::all();

        return view('Admin.listvideo', [
            'kategori' => $kategori
        ]);
    }

    public function chart(){
        $getdata = DB::table('rekomendasi')->get();

        return view('Admin.addchart',  ["dataSaham" => $getdata]);
    }

    public function addChart(Request $request){
        $namasaham = $request->input('nama');
        $keterangan = $request->input('keterangan');

        if ($namasaham == "" || $keterangan == "") {
            Alert::error('Error', 'Tidak boleh ada yang kosong!');
            return redirect()->back();
        }
        else{
            DB::insert('insert into rekomendasi (nama, keterangan) values (?, ?)', [$namasaham, $keterangan]);
            Alert::success('Success', 'Berhasil Add!');
            return redirect()->back();
        }
    }

    public function filter(Request $request){
        $filter = $request->input('filterKode');

        if ($filter == "") {
            Alert::error('Error', 'Tidak boleh ada yang kosong!');
            return redirect()->back();
        }else{
            $hasil = DB::table('rekomendasi')->where('nama', "LIKE", "%".$request->input("filterKode")."%")->get();
            return view("Admin.addchart", ["dataSaham" => $hasil]);
        }
    }

    public function update(Request $request, $id){
        $nama = $request->input('coba');
        $keterangan = $request->input('keteranganSaham');

        if ($nama == "" || $keterangan == "") {
            Alert::error('Error', 'Tidak boleh ada yang kosong!');
            return redirect()->back();
        }else{
            $result = DB::update('update rekomendasi set nama = ? , keterangan = ? where id = ?', [$nama , $keterangan , $id]);

            if ($result) {
                Alert::success('Success', 'Berhasil Update!');
                return redirect()->route("homeadd");
            }
            else{
                Alert::error('Error', 'Gagal Update!');
                return redirect()->route("homeadd");
            }
        }
    }

    public function delete($id){
        $result = DB::table('rekomendasi')->delete($id);

        if ($result) {
            Alert::success('Success', 'Berhasil Delete!');
            return redirect()->route("homeadd");
        }else{
            Alert::error('Error', 'Gagal Delete!');
            return redirect()->route("homeadd");
        }
    }

    public function validasi(){
        $listHistory = DB::table('transaksi')->get();
        return view('Admin.validasipembayaran',[
            "listHistory" => $listHistory
        ]);
    }

    public function listmember(){
        $listUser = DB::table('user')->get();
        return view('Admin.listmember',[
            "listUser" => $listUser
        ]);
    }

    public function searchmember(Request $request){
        $q = $request->input('search');
        $user = DB::table('user')->where('nama','LIKE', '%'.$q.'%')->orWhere('email','LIKE', '%'.$q.'%')->get();
        return view('Admin.listmember',[
            "listUser" => $user
        ]);
    }

    public function chartperkembangan(){
        $year = DB::select("SELECT YEAR(created_at) AS year FROM user GROUP BY YEAR(created_at)");

        return view('Admin.chartperkembangan',[
            'year' => $year
        ]);
    }

    public function chartumur(){
        $hitung = DB::select('SELECT umur ,COUNT(*) AS jumlah FROM user GROUP BY umur ORDER BY umur');
        // dd($hitung);
        // return response()->json($hitung);
        return view('Admin.chartumur', ["data" => $hitung]);
    }

    public function logout(){
        Session::forget("idAdmin");
        return redirect("/");
    }

    public function getMemberByYear(Request $request)
    {
        $date = $request->year;

        $data = DB::select("SELECT MONTH(created_at) AS month, COUNT(ID) AS total FROM user WHERE YEAR(created_at) = $date GROUP BY YEAR(created_at), MONTH(created_at)");

        // $data = DB::select("SELECT MONTH(created_at) as month FROM USER WHERE YEAR(CREATED_AT) = $date GROUP BY MONTH(CREATED_AT)");

        return response()->json([$data, $date], 200);
    }

    public function filterNama(Request $request)
    {
        $listHistory = DB::table('transaksi')->where('nama', 'LIKE', '%'.$request->input("nama").'%')->get();
        return view('Admin.validasipembayaran',[
            "listHistory" => $listHistory
        ]);
    }

    public function filterTanggal(Request $request)
    {
        $dateawal = $request->input("dateawal");
        $dateakhir = $request->input("dateakhir");
        // $listHistory = DB::select("select * from transaksi where created_at >= $dateawal and created_at <= $dateakhir");
        $listHistory = Transaksi::Where('created_at', '>=', $dateawal)->where('created_at', '<=', $dateakhir)->get();
        // dd($listHistory);
        return view('Admin.validasipembayaran',[
            "listHistory" => $listHistory
        ]);
    }
}
