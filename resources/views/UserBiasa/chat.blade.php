@extends('templateHome')
@section('content')
<style>
    body{
        width: 100%;
        height: 100vh;
        background-color: #b1bfd8;
        background-image: linear-gradient(160deg, #b1bfd8 0%, #6782b4 74%);
        /* background: linear-gradient(150deg, #9600FF 10%,#AEBAF8 50%); */
    }
    #punyaeuser{
        text-align: right;
    }
    #asing{
        border: 4px;
    }
    .coba{
        border: 4px solid black;
        border-radius: 10px;
    }

</style>
<h1 class="mt-4">{{ $service->judul}}</h1>
<table class="table table-dark table-striped">
    <thead>
    </thead>
    <tbody>
        @forelse ($chats as $chat)
            @if ($chat->unsend==0)


                @if ($chat->pengirim==1)
                    <input id="punyaecs" class="form-control" type="text" value=" Customer Service : {{$chat->isi}}" aria-label="readonly input example" readonly>
                    <br>
                @else

                    <form class="form-horizontal" action="{{ route('unsendchatbiasa', $chat->id) }}" method="POST">
                    @csrf

                        <div class="form-control" id="punyaeuser">
                            <button name="btnaddchat" type="submit" onclick="return confirm('Are you sure you want to unsend this massage?')" >Unsend</button>
                    <input  type="text" value="Me :{{$chat->isi}} "  aria-label="readonly input example" readonly>
                    </div>
                </form>
                    <br>
                @endif


            @else

                @if ($chat->pengirim==1)
                    <input id="punyaecs" class="form-control" type="text" value=" Customer Service : This Massage has been unsent" aria-label="readonly input example" readonly>
                    <br>
                @else
                    <input class="form-control" id="punyaeuser"  type="text" value="Me : This Massage has been unsent "  aria-label="readonly input example" readonly>

                </form>
                    <br>
                @endif

            @endif
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada Chat saat ini!</td>
            </tr>
        @endforelse
    </tbody>
</table>
    <form class="form-horizontal" action="{{ route('addchat', $service->id) }}" method="POST">
        @csrf
        <h1>Chat</h1>
        <input type="text" name="isichat" placeholder="Chat Yang ingin disampaikan" class="form-control">
        <br>
        <button type="submit" class="btn btn-primary" name="btnaddchat" >Chat</button>
        <br>
        <br>

        <a href="/userBiasa/cs"><button type="button" class="btn btn-warning">Back To Dashboard</button></a>
    </form>
    <form class="form-horizontal" action="{{ route('finishservicevip', $service->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to finish this chat?')" name="btnaddchat" >Finish</button>
        <br>
    </form>
@endsection
