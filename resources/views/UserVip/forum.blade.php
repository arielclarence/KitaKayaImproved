@extends('templatehomevip')
@section('content')

<h1 class="mt-4">{{ $video->nama}}</h1>
    <h1 class="mt-4">Posts</h1>
    <table class="table table-dark table-striped">
        <thead>
        </thead>
        <tbody>
                    @forelse ($threads as thread)
                    <tr>
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>
                                    <form action="../controllers/forum.php" method="POST">
                                        <h3>Posts</h3>
                                        <h4><?= $thread->created_at?></h4>
                                        <h4>Judul Post : <?= $thread->Judul?></h4>
                                        <h4>Poster : <?= $thread->namamember?></h4>
                                        <input type="text" id="namamenu" name="isicomment" placeholder="Isi reply" class="form-control">
                                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                                            <button class="btn btn-primary" name="comment[<?=$thread->id?>]">Reply</button>
                                        </div>
                                    </form>
                                </span>
                            </div>
                        </div>

                    </tr>
                @empty
                    {{-- HANYA TAMPIL JIKA LIST BUKU KOSONG --}}
                    <tr>
                        <td colspan="7" style="text-align: center;">Tidak ada Forum saat ini!</td>
                    </tr>
                @endforelse
            
        </tbody>
    </table>
@endsection
