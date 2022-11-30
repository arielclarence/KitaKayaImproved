@extends('templatehomevip')
@section('content')

<h1 class="mt-4">{{ $video->nama}}</h1>
    <table class="table table-dark table-striped">
        <thead>
        </thead>
        <tbody>


                    @forelse ($threads as $thread)
                    <tr>
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>
                                    <form action="{{ route('addreplyforumvip', $thread->id) }}" method="POST">
                                        @csrf
                                        <h3>Posts</h3>
                                        @php
                                            $input = $thread->created_at;
                                            $lengkap = strtotime($input);
                                            $date=date('d-M-Y', $lengkap);
                                            $time=date('h:i:s', $lengkap);
                                        @endphp

                                        <h4>{{$date}}</h4>
                                        <h4>{{$time}}</h4>

                                        @if ($thread->created_at!=$thread->updated_at)
                                            <h4>(Edited)</h4>

                                        @endif
                                        <h4>Judul Post : <?= $thread->Judul?></h4>
                                        <h4>Isi Post : <?= $thread->isi?></h4>
                                        <h4>Poster : <?= $thread->namamember?></h4>
                                        <input type="text"  name="isi" placeholder="Isi reply" class="form-control">
                                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                                            <button type="submit" class="btn btn-primary" >Reply</button>
                                        </div>

                                    </form>
                                    <form action="{{ route('toeditpostforumvip', $thread->id) }}" method="GET">
                                        @csrf
                                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                                        <button type="submit" class="btn btn-primary" >Edit</button>
                                    </div>
                                    </form>
                                    @foreach ($comments as $comment)
                                        @if ($comment->thread_forum==$thread->id)
                                        <form action="{{ route('addreplycommentforumvip', $comment->id) }}" method="POST">
                                            @csrf
                                            <br>
                                            <span>
                                                @php
                                                    $input = $comment->created_at;
                                                    $lengkap = strtotime($input);
                                                    $date=date('d-M-Y', $lengkap);
                                                    $time=date('h:i:s', $lengkap);
                                                @endphp
                                                @if ($comment->created_at!=$comment->updated_at)
                                                <h4>(Edited)</h4>

                                                @endif
                                                <h4>{{$date}}</h4>
                                                <h4>{{$time}}</h4>
                                                <h4 style="margin-left: 20px;">Pereply : {{$comment->member}}</h4>
                                                <h4 style="margin-left: 20px;">Isi : {{$comment->isi}}</h4>
                                                <input type="text" name="isi" placeholder="Isi reply" class="form-control" style="margin-left: 20px;">
                                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                    <button style="margin-left: 20px;" class="btn btn-primary" name="replycomment[]">Reply</button>
                                                </div>
                                            </span>

                                        </form>
                                        <form action="{{ route('toeditreplyforumvip', $comment->id) }}" method="GET">
                                            @csrf
                                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                                            <button type="submit" class="btn btn-primary" >Edit</button>
                                        </div>
                                        </form>

                                                @php
                                                    $cek=1;
                                                    $idcomment=$comment->id;
                                                @endphp
                                                @while ($cek==0)
                                                    @php
                                                        $cek=0;
                                                    @endphp
                                                    @foreach ($comments as $reply)

                                                    @if ($thread->id==$reply->thread_forum&&$reply->reply==$idcomment)
                                                        @php
                                                            $cek=$cek+1;
                                                        @endphp
                                                    <form action="{{ route('addreplycommentforumvip', $reply->id) }}" method="POST">
                                                        <span>
                                                            <br>
                                                            @php
                                                            $input = $reply->created_at;
                                                            $lengkap = strtotime($input);
                                                            $date=date('d-M-Y', $lengkap);
                                                            $time=date('h:i:s', $lengkap);
                                                            @endphp

                                                            <h4>{{$date}}</h4>
                                                            <h4>{{$time}}</h4>
                                                            @if ($reply->created_at!=$reply->updated_at)
                                                            <h4>(Edited)</h4>

                                                            @endif
                                                            <h4 style="margin-left: 20px;">Pereply : {{$commentreply->member}}</h4>
                                                            <h4 style="margin-left: 20px;">Isi : {{$commentreply->isi}}</h4>
                                                            <input type="text" id="namamenu" name="isireplycomment" placeholder="Isi reply" class="form-control" style="margin-left: 60px;">
                                                            <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                                <button class="btn btn-primary" name="replycomment" style="margin-left: 60px;">Reply</button>
                                                            </div>
                                                            </span>
                                                        </form>
                                                    @endif
                                                    @endforeach
                                                @endwhile





                                        @endif

                                        @endforeach
                                </span>
                            </div>
                        </div>

                    </tr>
                @empty
                    {{-- HANYA TAMPIL JIKA LIST BUKU KOSONG --}}
                    <tr>
                        <td colspan="7" style="text-align: center;">Tidak ada Thread saat ini!</td>
                    </tr>
                @endforelse

        </tbody>
    </table>

    <form class="form-horizontal" action="{{ route('addpostforumvip', $idkategori) }}" method="POST">
        @csrf
        <h1>Post</h1>
        <input type="text" id="namamenu" name="judul" placeholder="Post Yang ingin disampaikan" class="form-control">
        <br>
        <input type="text" id="namamenu" name="isi" placeholder="Isi Yang ingin disampaikan" class="form-control">
        <br>
        <button type="submit" class="btn btn-primary" name="btnaddpost" >Post</button>
        <br>
        <br>
        <a href="/userVip/forum"><button type="button">Back To Dashboard</button></a>

    </form>
@endsection
