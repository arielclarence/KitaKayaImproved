<?php

namespace App\Http\Controllers;

use App\Models\Thread;
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

        $thread = new Thread();
        $thread->judul = $judul;
        $thread->video = $link;
    }
}
