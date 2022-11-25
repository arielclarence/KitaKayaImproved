@extends('templateAdmin')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Chart Umur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Umur</li>
        </ol>
        <br>
        <canvas id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var users =  String({{ $data[0]->jumlah }});
        var labels =  String({{ $data[0]->umur }});
      const data = {
        labels: [
            labels
        ],
        datasets: [{
          label: "Data Umur Member",
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
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
