@extends('templatehomevip')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Rekomendasi Saham</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Saham</li>
        </ol>
        <h3>Keterangan</h3>
        <h5></h5>
         <!-- TradingView Widget BEGIN -->
         <div class="tradingview-widget-container">
            <div id="tradingview_5e0cc"></div>
            <div class="tradingview-widget-copyright"><a
                    href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener"
                    target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
                new TradingView.widget(
                {
                    "width": 1629,
                    "height": 466,
                    "symbol": "NASDAQ:AAPL",
                    "interval": "D",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "allow_symbol_change": true,
                    "container_id": "tradingview_c0540"
                }
                );
                </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</main>
@endsection

