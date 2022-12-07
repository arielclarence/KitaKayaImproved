@extends('templatehomevip')
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">History Transaksi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pembelian Member</li>
            </ol>
            <main>
            <div class="form-outline">
                <form action="{{ route('filtertanggalvip') }}" method="post">
                    @csrf
                    {{-- <label class="form-label" for="form1">Search</label><br> --}}
                    Tanggal Transaksi :
                    <input type="date" name="dateawalvip" id=""> - <input type="date" name="dateakhirvip" id="">
                    <button type="submit" class="btn btn-primary" name="search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <br>
            {{-- <form action="../controllers/transaksi.php" method="POST"> --}}
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
            {{-- </form> --}}
        </div>
    </main>
@endsection
