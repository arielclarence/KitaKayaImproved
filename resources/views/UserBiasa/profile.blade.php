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
        <h1 class="mt-4">My Profile</h1>
        @if(count($data_user) > 0)
            @foreach ($data_user as $d)
                <h6>Nama Lengkap: {{$d->nama}}</h6>
                <h6>Email: {{$d->email}}</h6>
                <h6>Umur: {{$d->umur}}</h6>

                @if ($d->status == 1)
                <h6 style="color: green">Status: Active</h6>
                @else
                <h6 style="color: red">Status: Deactiveds</h6>
                @endif

                @if ($d->role == 0)
                <h6 style="color: blue">Role: User Reguler</h6><a href="{{url('/userBiasa/upgrade')}}"><button class="btn btn-info" style="color: white">Jadi User VIP? Yuk!!</button></a>
                @elseif ($d->role == 1)
                <h6 style="color: gold">Role: User VIP</h6>
                @endif
            @endforeach
        @else
        @endif
    </div>
</main>
@endsection
