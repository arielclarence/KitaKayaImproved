@extends('templateHome')
@section('content')
<div class="mb-2">
    <h1 class="mt-4">Forum {{ $video->judul}}</h1>
    <div class="row">
        <div class="col">
            <p>Cari Pembahasan mengenai forum kamu disini...</p>
        </div>
        <div class="col-3 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Pembahasan
            </button>
        </div>
        <div class="col-3 text-end">
            <a href="{{ url('/userBiasa/forum') }}" class="btn btn-danger">Back To Forums</a>
        </div>
    </div>
</div>
<hr>
<br>
<div class="d-flex flex-wrap justify-content-evenly">
    @forelse ($threads as $thread)
    <a href="{{ url("/userBiasa/forum/$thread->id/detail") }}" class="text-decoration-none text-black mb-4" style="width: 45%;">
        <div class="card p-2 shadow">
            <h1 class="text-center">{{ $thread->judul }}</h1>
            <br>
            <h5>{{ $thread->isi }}</h5>
            <p>Posted By {{ $thread->namamember }}</p>
            @if ($thread->namamember==Session::get('nama'))

            <form action="{{ route('toeditpostforumbiasa', $thread->id) }}" method="GET">
                @csrf
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </form>
            @endif
        </div>
    </a>
    @empty
    {{-- HANYA TAMPIL JIKA LIST BUKU KOSONG --}}
    <tr>
        <td colspan="7" style="text-align: center;">Tidak ada Thread saat ini!</td>
    </tr>
    @endforelse
</div>
{{-- <div class="card p-3" style="50%">
        <div class="d-flex justify-content-between align-items-center">
            <span>
                <form action="{{ route('addreplyforumbiasa', $thread->id) }}" method="POST">
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
<h4>Judul Post : <?= $thread->judul?></h4>
<h4>Isi Post : <?= $thread->isi?></h4>
<h4>Poster : <?= $thread->namamember?></h4>
<input type="text" name="isi" placeholder="Isi reply" class="form-control">
                                        <span style="color: red;">{{ $errors->first('isi') }}</span>

<div class="action d-flex justify-content-between mt-2 align-items-center">
    <button type="submit" class="btn btn-primary">Reply</button>
</div>

</form>
@if ($thread->namamember==Session::get('nama'))

<form action="{{ route('toeditpostforumbiasa', $thread->id) }}" method="GET">
    @csrf
    <div class="action d-flex justify-content-between mt-2 align-items-center">
        <button type="submit" class="btn btn-warning">Edit</button>
    </div>
</form>
@endif

@foreach ($comments as $comment)
@if ($comment->thread==$thread->id)
<form action="{{ route('addreplycommentforumbiasa', $comment->id) }}" method="POST">
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
        <h4 style="margin-left: 20px;">(Edited)</h4>

        @endif
        <p style="margin-left: 20px;"><b>{{$comment->namamember}}</b> {{$date}} {{$time}}</p>
        <h4 style="margin-left: 20px;">{{$comment->isi}}</h4>

    </span>

</form>
@if ($comment->namamember==Session::get('nama'))

<form action="{{ route('toeditreplyforumbiasa', $comment->id) }}" method="GET">
    @csrf
    <div class="action d-flex justify-content-between mt-2 align-items-center">
        <button style="margin-left: 20px;" type="submit" class="btn btn-warning">Edit</button>
    </div>
</form>
@endif








@endif

@endforeach
</span>
</div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal" action="{{ route('addpostforumbiasa', $idkategori) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <h1>Post</h1>
                    <input type="text" id="namamenu" name="judul" placeholder="Post Yang ingin disampaikan" class="form-control">
                    <br>
                    <input type="text" id="namamenu" name="isi" placeholder="Isi Yang ingin disampaikan" class="form-control">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="btnaddpost">Post</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
