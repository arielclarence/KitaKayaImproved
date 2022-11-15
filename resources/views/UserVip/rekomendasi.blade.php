@extends('templatehomevip')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Rekomendasi Saham</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Saham</li>
            </ol>
            <div class="card mb-4" style="height : 500px;">
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
        </div>
    </main>
</div>
@endsection

