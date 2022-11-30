@extends('templateCs')
@section('content')
<main>
    @include('sweetalert::alert')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Forum</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Members</li>
        </ol>
        <br>
        <div style="height: 100vh"></div>
        <div class="card mb-4"><div class="card-body">Ini Untuk Bagian Bawah jika diperlukan</div></div>
    </div>
</main>
@endsection
