@extends('templateAdmin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Rekomendasi Saham</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Saham</li>
        </ol>
        <div>
            <!-- Add Watchlist nama harus sesuai dengan di trading view kalo gak error-->
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">AddWatchlist</button><br>
        </div>
        {{-- gae filter nama Saham --}}
        <br>
        <form method="POST">
            @csrf
            <label for="">Filter Saham : </label>
            <br>
            <br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Contoh : ASII">
            <small id="textHelp" class="form-text text-muted">Masukkan Kode Saham</small>
            <br>
            <br>
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>
        <table class="table">
            <thead>
              <tr>
                @php $no = 1 @endphp
                <th scope="col">No</th>
                <th scope="col">Nama Saham</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody>
                @if (count($dataSaham) > 0)
                    @foreach ($dataSaham as $h)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$h->nama}}</td>
                        <td>{{$h->keterangan}}</td>
                    </tr>
                    @php $no = $no + 1 @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="5"><center>Tidak ada Rekomendasi</center></td>
                    </tr>
                @endif
            </tbody>
        </table>
        <br>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Watchlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row gy-4">
                        <center>
                            <div class="col-lg-8">
                                <form method="POST">
                                    @csrf
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">Nama</label>
                                        <input type="text" class="form-control" placeholder="AAPL" id="nama"
                                            name="nama">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">keterangan</label><br>
                                        <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" name="login"
                                            data-bs-dismiss="modal">Add</button>
                                    </div>
                                </form>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal"></div>
@endsection
