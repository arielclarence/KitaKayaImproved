@extends('templateAdmin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Validasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Transfer</li>
        </ol>
         <form action="" method="POST">
             <!--Fitur Search-->
            <div class="form-outline">
                <label class="form-label" for="form1">Nama</label>
                <input type="search" name="nama">
                <br>
                Tanggal Transaksi :
                <input type="date" name="dateawal" id=""> - <input type="date" name="dateakhir" id="">
                <br>
                <button type="submit" class="btn btn-primary" name="search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <th>Nama Member</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse ($listHistory as $history)
                    <tr>
                        <td>{{ $history->nama }}</td>
                        <td>{{ $history->created_at }}</td>
                        <td>Berhasil</td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </form>
    </div>
</main>
@endsection
