@extends('templateHome')
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">History Transaksi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pembelian Member</li>
            </ol>
            <main>
            <div class="form-outline">
                <label class="form-label" for="form1">Search</label>
                <input type="search"/>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <br>
            <form action="../controllers/transaksi.php" method="POST">
                <table class="table table-dark table-striped">
                    <thead>
                        <th>Nama Member</th>
                        <th>Bukti Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>
    </main>
@endsection
