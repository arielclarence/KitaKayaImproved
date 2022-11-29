@extends('templatehomevip')
@section('content')

<h1 class="mt-4">{{ $service->judul}}</h1>
    <h1 class="mt-4">Chat</h1>
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
                    {{-- HANYA TAMPIL JIKA LIST BUKU KOSONG --}}
                    <tr>
                        <td colspan="7" style="text-align: center;">Tidak ada Forum saat ini!</td>
                    </tr>
                @endforelse

        </tbody>
    </table>
@endsection
