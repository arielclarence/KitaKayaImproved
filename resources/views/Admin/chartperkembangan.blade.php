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
        {{-- <input type="number" placeholder="Masukan Tahun" id="tahun" class="form-control"> --}}
        @if (count($year) <= 0)
            <h1>Tidak ada member...</h1>
        @else
            <select class="form-control" id="tahun">
                @forelse ($year as $item)
                <option value="{{ $item->year }}">{{ $item->year }}</option>
                @empty

                @endforelse
            </select>
            <br>
            <button id="search" class="btn btn-primary">search</button>
        @endif
    </div>

    <div id="result">
    </div>
    <canvas id="chart" class="w-100"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
            url: "{{url('/get/chart/perkembangan')}}",
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
