@extends('templateCs')
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
    @include('sweetalert::alert')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Customer Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Saham</li>
        </ol>

        
        <br>

            <table class="table table-dark table-striped">
                <thead>
                    <th>ID</th>
                    <th>Judul Pertanyaan</th>
                    <th>Rate</th>
                    <th colspan="2">Chat</th>
                </thead>



                @forelse ($services as $service)
                @if ($service->rate==0)
                <tr>
                    <td>{{ $service->id}}</td>
                    <td>{{ $service->judul}}</td>
                    @if ($service->status==0)
                        <td>
                        <form class="form-horizontal" action="{{ route('finishservicevip', $service->id) }}" method="POST">
                            @csrf
                            Service not finished
                            <button type="submit" class="btn btn-danger" name="btnaddchat" >Finish</button>

                        </td>
                        </form>
                    @elseif ($service->rate!=0)
                    <td>
                        {{$service->rate}}/5
                        </td>
                    @else

                    <td>
                        Service has not been rated
                    </td>
                @endif
                @if ($service->status==0)

                    <td><a href="{{ route('detailcsvip', $service->id) }}" class="btn btn-primary">Chat</a><td>

                    </form>
                    @else
                    <td>
                        Finished
                    </td>
                    @endif
                </tr>



                @endif
                @empty

                @endforelse

            </table>
    </div>
</main>
@endsection
