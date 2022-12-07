@extends('templateAdmin')
@section('content')
    <style>
        .chart{
            margin: auto;
            width: 550px;
            height: 500px;
        }
    </style>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Chart Umur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Umur</li>
        </ol>
        <br>
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>

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
          backgroundColor: ['rgb(255, 99, 132)',
                            'rgb(210, 20, 111)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(30, 196, 255)',
                            'rgb(2, 166, 24)',
                            'rgb(252, 51, 11)',
                            'rgb(252, 11, 204)',
                            'rgb(0, 255, 77)'],
          borderColor: 'rgb(255, 99, 132)',
          data:  [@foreach ($data as $h)
                    String({{ $h->jumlah }}),
                @endforeach]
        }]
      };

      const config = {
        type: 'pie',
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
