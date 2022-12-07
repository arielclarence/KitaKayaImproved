@extends('templatehomevip')
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
            <a href="{{ url('/userVip/forum') }}" class="btn btn-danger">Back To Forums</a>
        </div>
    </div>
</div>
<hr>
<br>
<div class="d-flex flex-wrap justify-content-evenly">
    @forelse ($threads as $thread)
    <a href="{{ url("/userVip/forum/$thread->id/detail") }}" class="text-decoration-none text-black mb-4" style="width: 45%;">
        <div class="card p-2 shadow">
            <h1 class="text-center">{{ $thread->judul }}</h1>
            <br>
            <h5>{{ $thread->isi }}</h5>
            <p>Posted By {{ $thread->namamember }}</p>
            <h5>Tekan Disini.</h5>
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
