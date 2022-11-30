@extends('templatehomevip')
@section('content')

<h1 class="mt-4">{{ $service->judul}}</h1>
    <table class="table table-dark table-striped">
        <thead>
        </thead>
        <tbody>
            @forelse ($chats as $chat)
                @if ($chat->pengirim==1)
                    <input id="punyaecs" class="form-control" type="text" value=" Customer Service : {{$chat->isi}}" aria-label="readonly input example" readonly>
                    <br>
                @else
                    <input id="punyaeuser" class="form-control" type="text" value="Me :{{$chat->isi}}   " aria-label="readonly input example" readonly>
                    <br>
                @endif
                @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada Chat saat ini!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <form class="form-horizontal" action="{{ route('addchatvip', $service->id) }}" method="POST">
        @csrf
        <h1>Chat</h1>
        <input type="text" name="isichat" placeholder="Chat Yang ingin disampaikan" class="form-control">
        <br>
        <button type="submit" class="btn btn-primary" name="btnaddchat" >Chat</button>
        <br>
        <br>
        <a href="/userVip/cs"><button type="button" class="btn btn-warning">Back To Dashboard</button></a>
    </form>
@endsection
