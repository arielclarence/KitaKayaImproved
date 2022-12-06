@extends('templateHome')
@section('content')



    <form class="form-horizontal" action="{{ route('editpostforumbiasa', $thread->id) }}" method="POST">
        @csrf
        <h1>Post</h1>
        <input type="text" name="judul" placeholder="Post Yang ingin disampaikan" value="{{$thread->judul}}" class="form-control">
        <br>
        <input type="text" name="isi" placeholder="Isi Yang ingin disampaikan" value="{{$thread->isi}}" class="form-control">

        <br>
        <button type="submit" class="btn btn-primary" name="btnaddpost" >Edit Post</button>
        <br>
        <br>
        <a href="/userVip/forum/{{$thread->kategori}}"><button type="button" class="btn btn-danger">Cancel Edit</button></a>

    </form>
@endsection
