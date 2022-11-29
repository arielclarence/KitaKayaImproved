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
        <button id="search" class="btn btn-primary">search</button>
    </div>

    <canvas id="chart" class="w-100"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
</script>
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
            url: '/get/chart/perkembangan',
            data: {
                year: year
            },
            success: function(data) {
                console.log(data)
            }
        })
    }
</script>
@endsection
