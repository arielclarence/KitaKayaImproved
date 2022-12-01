@extends('templateAdmin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Chart Perkembangan Member</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Members</li>
    </ol>
    <br>
    {{-- <select name="" id="tahun"></select> --}}
    <div class="mb-4">
        <input type="number" placeholder="Masukan Tahun" id="tahun" class="form-control">
        <br>
        <button id="search" class="btn btn-primary">search</button>
    </div>

    <div id="result">
    </div>
    <canvas id="chart" class="w-100"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#search').click(function(){
            let year = $('#tahun').val();
            if (year == '') {
                alert('tahun harus di isi');
            } else {
                getMemberByYear(year);
            }
        });
    })

    function getMemberByYear(year) {
        $.ajax({
            type: 'GET',
            url: '{{url('/get/chart/perkembangan')}}',
            data: {
                year: year
            },
            success: function(data) {
                console.log(data)
                if (data[0].length <= 0) {
                    $('#result').html("Tidak ada Member Baru yang mendaftar pada tahun : " + data[1])
                    $('#chart').hide();
                } else {
                    $('#result').html('');
                    $('#chart').show();
                    renderChart(data)
                }
            }
        })
    }

    function renderChart(input){
        const chart = $('#chart');

        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const labels = [];
        const items = [];
        input[0].forEach(element => {
            labels.push(monthNames[parseInt(element.month)-1])
            items.push(element.total)
        });

        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Member Baru per Tahun ' + input[1],
                data: items,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };

        new Chart(chart, config);
    }
</script>
@endsection
