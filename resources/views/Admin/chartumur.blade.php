@extends('templateAdmin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Chart Umur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Umur</li>
        </ol>
        <br>
        <canvas id="myChart"></canvas>
        {{-- done --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">

        @foreach ($data as $h)
            var users =  String({{ $h->jumlah }});
            var labels =  String({{ $h->umur }});
        @endforeach

        // var users =  String({{ $data[0]->jumlah }});
        // var labels =  String({{ $data[0]->umur }});
      const data = {
        labels: [
            @foreach ($data as $h)
                String({{ $h->umur }}),
            @endforeach
        ],
        datasets: [{
          label: "Data Umur Member",
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data:  [@foreach ($data as $h)
                    String({{ $h->jumlah }}),
                @endforeach]
        }]
      };

      const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
            y: {
                beginAtZero: true
                }
            }
        }
      };

      new Chart(
        document.getElementById('myChart'),
        config
      );
    </script>
@endsection
