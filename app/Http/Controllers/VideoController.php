<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function add(Request $request)
    {
        $judul = $request->judul;
        $kategori = $request->kategori;
        $link = $request->link;

        $video = new Video();
        $video->judul = $judul;
        $video->location = $link;
        $video->bab = $kategori;
        $video->vip = 0;
        $video->save();
    }
}
