@extends('templateHome')
@section('content')

<style>
    #btnkeluar{
        margin-left: 45px;
    }
    .rate{

    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px;

    }

    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    margin-right: 72%;
    }

    .rating>input {
    display: none
    }

    .rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
    }

    .rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
    opacity: 1 !important
    }

    .rating>input:checked~label:before {
    opacity: 1
    }

    .rating:hover>input:checked~label:before {
    opacity: 0.4
    }

    .ratingg {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    margin-right: 70%;
    }

    .ratingg>input {
    display: none
    }

    .ratingg>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
    }

    .ratingg>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
    }

    .ratingg>label:hover:before,
    .ratingg>label:hover~label:before {
    opacity: 1 !important
    }

    .ratingg>input:checked~label:before {
    opacity: 1
    }

    .ratingg:hover>input:checked~label:before {
    opacity: 0.4
    }





</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Customer Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Saham</li>
        </ol>

        <form class="form-horizontal" action="{{ route('addpertanyaan') }}" method="POST">
@csrf
            <label class="control-label"  for="namamenu">Pertanyaan</label>
            <br>
            <br>
            <div class="controls">
                <input type="text" class="form-control" name="isi" placeholder="Pertanyaan">
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnaddser">Add</button>
            </div>
        </form>
        <br>

            <table class="table table-dark table-striped">
                <thead>
                <th>ID</th>

                    <th>Judul Pertanyaan</th>
                    <th>Rate</th>
                    <th>Chat</th>

                </thead>
                @forelse ($services as $service)
                <tr>
                    <td>{{ $service->id}}</td>
                    <td>{{ $service->judul}}</td>
                    <td>{{ $service->rate}}</td>

                    <td><button class="btn btn-danger" id="btnclear" ><a href="{{ route('detailcs', $service->id) }}">Chat</a></button><td>



                </tr>
            @empty
                {{-- HANYA TAMPIL JIKA LIST BUKU KOSONG --}}
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada item saat ini!</td>
                </tr>
            @endforelse
            </table>
    </div>
</main>
@endsection
