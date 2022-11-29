<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Thread;
use App\Models\Video;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    //
    public function add(Request $request)
    {
        $judul = $request->judul;
        $kategori = $request->kategori;
        $link = $request->link;

        $cat = Kategori::where('nama_kategori','=',$kategori)->first();
        if ($cat == null) {
            $cat = new Kategori();
            $cat->nama_kategori = $kategori;
            $cat->status = 1;
            $cat->save();
        }

        $thd = new Thread();
        $thd->judul = $judul;
        $thd->video = $link;
        $thd->status_video = 1;
        $thd->f_kategori = $cat->id;
        $thd->save();

        Alert::success('Success', 'Berhasil Add Video !');

        return back();
    }

    public function getByKategori(Request $request)
    {
        $key = $request->kategori;

        $data = Thread::where('f_kategori','=',$key)->get();

        return response()->json(
            $data, 200
        );
    }
}
