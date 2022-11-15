@extends('templateAdmin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Chart</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Saham</li>
        </ol>
        <br>
        <div style="height: 100vh">
            <!-- Add Watchlist nama harus sesuai dengan di trading view kalo gak error-->
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Add
                Watchlist</button><br>
        </div>
        <div class="card mb-4" style="height : 500px; margin-top: -54%;">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                onchange="change()"></select><br>
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div id="tradingview_5e0cc"></div>
                <div class="tradingview-widget-copyright"><a
                        href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener"
                        target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            </div>
            <!-- TradingView Widget END -->
        </div>
        <h3>Keterangan</h3>
        <h5></h5>
        <!-- <div class="card mb-4">
            <div class="card-body">Ini Untuk Bagian Bawah jika diperlukan</div>
        </div> -->
    </div>
</main>
@endsection
