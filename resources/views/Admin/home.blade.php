@extends('templateAdmin')
@section('content')
<main>
    @include('sweetalert::alert')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Video</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Saham</li>
        </ol>
        <form method="POST" action="/admin/addVideo">
            @csrf
            <div>
                <div class="col-lg-6">
                    <label class="form-label">Kategori Video</label>
                    <input type="text" class="form-control" placeholder="Beginner" id="nama" name="kategori">
                </div>
                <br>
                <div class="col-lg-6">
                    <label class="form-label">Judul Video</label>
                    <input type="text" class="form-control" placeholder="Saham888" id="nama" name="judul">
                </div>
                <br>
                <div class="col-lg-6">
                    <label class="form-label">Link Video</label>
                    <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?kitakaya" id="nama" name="link">
                </div>
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnaddvid" >Add</button>
            </div>
        </form>
    </div>
</main>
@endsection
