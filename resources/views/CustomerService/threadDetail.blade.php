@extends('templateCs')
@section('content')
<div class="overflow-auto pb-3">
    <div class="p-4 border rounded shadow mt-2">
        <h1 class="text-center">{{ $thread->judul }}</h1>
        <p>{{ $thread->isi }}</p>
        <hr>
        <p>Posted By {{ $thread->namamember }}</p>
    </div>
    <br>
    <div class="p-4">
        <h3>Comments</h3>
        @forelse ($comments as $item)
            <div class="px-4 py-2 border rounded mb-2">
                <div class="d-flex">
                    <h5 class="w-50">{{ $item->namamember }}</h5>
                    @php
                        $user = DB::table('user')->where('nama','=', $item->namamember)->first();
                        // dd($user);
                    @endphp
                    @if ($user==null)

                    @else
                    <p>Exp : {{ $user->exp}}</p>
                    @endif
                </div>
                <p>Commented on {{ $item->created_at }}</p>
                @if ($item->created_at!=$item->updated_at)
                <h6>(Edited)</h6>
                @endif

                <hr>
                <p>{{ $item->isi }}</p>

                @if ($item->namamember=="Customer Service")

                <form action="{{ route('toeditreplyforumcs', $item->id) }}" method="GET">
                    @csrf
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <button  type="submit" class="btn btn-warning" >Edit</button>

                </div>
                </form>
                @endif
            </div>


        @empty
            <div class="">No Comments...</div>
        @endforelse
    </div>
    <div class="p-4">
        <h5>Post a Comment</h5>
        <form action="{{ url("/cs/add/comment") }}" method="POST">
            @csrf
            <textarea name="isi" id="" cols="30" rows="3" class="form-control" required></textarea>
            <br>
            <div class="d-flex">
                <button type="submit" value="{{ $thread->id }}" name="thread-id" class="btn btn-primary">Post!</button>
                <a href="{{ url("cs/forum/$thread->kategori") }}" class="mx-2 btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div>
<br>

@endsection
