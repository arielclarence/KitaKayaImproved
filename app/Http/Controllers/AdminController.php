<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
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
        return view('Admin.validasipembayaran');
    }

    public function chartperkembangan(){
        return view('Admin.chartperkembangan');
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

        $data = DB::select("SELECT MONTH(created_at) AS month, COUNT(ID) AS total FROM USER WHERE YEAR(created_at) = $date GROUP BY YEAR(created_at), MONTH(created_at) ASC");

        // $data = DB::select("SELECT MONTH(created_at) as month FROM USER WHERE YEAR(CREATED_AT) = $date GROUP BY MONTH(CREATED_AT)");

        return response()->json([$data, $date], 200);
    }
}
