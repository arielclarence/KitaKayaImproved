@extends('templatehomevip')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Rekomendasi Saham</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Saham</li>
        </ol>
        {{-- gae sorting --}}
        <form method="POST" action="{{url('/itemsss')}}">
            @csrf
            <h2>List Saham Pilihan : </h2>
            <br>
            <select name="listSaham" id="saham" class="form-select">
                @foreach($listSaham as $h)
                    <option value="{{$h->nama}}" data-provinsi={{$h->keterangan}} >{{$h->nama}}</option>
                @endforeach
            </select>
        </form>
        <br>
        <h3>Keterangan</h3>
        <input type="text" id="input" class="form-control" readonly>
        <br>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                    "symbol": $("select option:selected").text(),
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
    <script>
        // Ambil dari atribut data
      $(document).ready(function() {
        $('#saham').on('change', function() {
          const selected = $(this).find('option:selected');
          const prov = selected.data('provinsi');

          $("#input").val(prov);
        });
      });
    </script>
</main>
@endsection

