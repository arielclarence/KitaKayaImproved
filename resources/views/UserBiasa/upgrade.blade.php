@extends('templateHome')
@section('content')
<style>
    #btnkeluar{
        margin-left: 45px;
    }

    .card {
        border:none;
        padding: 10px 50px;
    }

    .card::after {
        position: absolute;
        z-index: -1;
        opacity: 0;
        -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card:hover {
        transform: scale(1.02, 1.02);
        -webkit-transform: scale(1.02, 1.02);
        backface-visibility: hidden;
        will-change: transform;
        box-shadow: 0 1rem 3rem rgba(0,0,0,.75) !important;
    }

    .card:hover::after {
        opacity: 1;
    }

    .card:hover .btn-outline-primary{
        color:white;
        background:#007bff;
    }

    #biarterlihat{
        color: red;
    }
</style>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Upgrade To VIP</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                <div class="card h-100 shadow-lg">
                    <div class="card-body">
                    <div class="text-center p-3">
                        <h5 class="card-title">Paket Standart</h5>
                        <small>Member VIP</small>
                        <br><br>
                        <span class="h3">Rp 120.000</span>
                        <br><br>
                    </div>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> Rekomendasi Saham Pilihan</li>
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> Video Lengkap</li>
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> 1 Bulan</li>
                    <br>
                    <p class="card-text" id="biarterlihat">*Pembayaran Langsung 1 Bulan di depan</p>
                    </ul>
                    <div class="card-body text-center">

                        <a href="{{url('/userBiasa/halamanupgrade')}}" class="btn btn-outline-primary btn-lg" style="border-radius:30px" name="btnbeli">Beli</a>

                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                <div class="card h-100 shadow-lg">
                    <div class="card-body">
                    <div class="text-center p-3">
                        <h5 class="card-title">Paket Super</h5>
                        <small>Member VIP</small>
                        <br><br>
                        <span class="h3">Rp 500.000</span>
                        <br><br>
                    </div>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> Rekomendasi Saham Pilihan</li>
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> Video Lengkap</li>
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> 6 Bulan</li>
                    <br>
                    <p class="card-text" id="biarterlihat">*Pembayaran Langsung 6 Bulan di depan</p>
                    </ul>
                    <div class="card-body text-center">
                    <form action="../controllers/auth.php" method="POST">
                        <a href="" class="btn btn-outline-primary btn-lg" style="border-radius:30px" name="btnbeli">Beli</a>
                    </form>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                <div class="card h-100 shadow-lg">
                    <div class="card-body">
                        <div class="text-center p-3">
                            <h5 class="card-title">Paket Terbaik</h5>
                            <small>Member VIP</small>
                            <br><br>
                            <span class="h3">Rp 1.100.000</span>
                            <br><br>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> Rekomendasi Saham Pilihan</li>
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> Video Lengkap</li>
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg> 12 Bulan</li>
                    <br>
                    <p class="card-text" id="biarterlihat">*Pembayaran Langsung 12 Bulan di depan</p>
                    </ul>
                    <div class="card-body text-center">
                    <form action="../controllers/auth.php" method="POST">
                        <a href="" class="btn btn-outline-primary btn-lg" style="border-radius:30px" name="btnbeli">Beli</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
