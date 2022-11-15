@extends('templateAdmin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Validasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Transfer</li>
        </ol>
         <form action="../controllers/transaksi.php" method="POST">
             <!--Fitur Search-->
            <div class="form-outline">
                <label class="form-label" for="form1">Nama</label>
                <input type="search" name="nama">
                <br>
                Tanggal Transaksi :
                <input type="date" name="dateawal" id=""> - <input type="date" name="dateakhir" id="">
                <br>
                Status :
                <select name="status" id="">
                    <option value="all">All</option>
                    <option value="0">Not Verified</option>
                    <option value="1">Accepted</option>
                    <option value="-1">Rejected</option>
                </select>
                <button type="submit" class="btn btn-primary" name="search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <th>Nama Member</th>
                    <th>Bukti Pembayaran</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </thead>
            </table>
        </form>
    </div>
</main>
@endsection
