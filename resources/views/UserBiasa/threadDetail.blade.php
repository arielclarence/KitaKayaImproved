@extends('templateHome')
@section('content')
    <div class="p-4 border rounded shadow mt-2">
        <h1 class="text-center">{{ $thread->judul }}</h1>
        <p>{{ $thread->isi }}</p>
        <hr>
        <p>Posted By {{ $thread->namamember }}</p>
    </div>
    <br>
    <h3>Comments</h3>
    <div class="">
        @forelse ($comments as $item)
            <div class="px-4 py-2 border rounded mb-2">
                <div class="d-flex">
                    <h5 class="w-50">{{ $item->namamember }}</h5>
                    @php
                        $user = DB::table('user')->where('nama','=', $item->namamember)->first();
                        dd($user);
                    @endphp
                    <p>Exp : {{ $user->exp }}</p>
                </div>
                <p>Commented on {{ $item->created_at }}</p>
                <hr>
                <p>{{ $item->isi }}</p>
            </div>
        @empty
            <div class="">No Comments...</div>
        @endforelse
    </div>
<div class="fixed-bottom">
    <div class="p-4 shadow mx-5 rounded">
        <h5>Post a Comment</h5>
        <form action="{{ url("/userBiasa/add/comment") }}" method="POST">
            @csrf
            <textarea name="isi" id="" cols="30" rows="3" class="form-control" required></textarea>
            <br>
            <button type="submit" value="{{ $thread->id }}" name="thread-id" class="btn btn-primary">Post!</button>
        </form>
    </div>
</div>

@endsection
