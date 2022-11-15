@extends('templateAdmin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Chart Perkembangan Member</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Members</li>
    </ol>
    <br>
    <select name="" id="tahun"></select>
    <canvas id="chart"></canvas>
    <div style="height: 100vh"></div>
    <div class="card mb-4"><div class="card-body">Ini Untuk Bagian Bawah jika diperlukan</div></div>
</div>
@endsection
