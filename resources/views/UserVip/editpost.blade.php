@extends('templatehomevip')
@section('content')



    <form class="form-horizontal" action="{{ route('editpostforumvip', $thread->id) }}" method="POST">
        @csrf
        <h1>Post</h1>
        <input type="text" name="judul" placeholder="Post Yang ingin disampaikan" value="{{$thread->Judul}}" class="form-control">
        <br>
        <input type="text" name="isi" placeholder="Isi Yang ingin disampaikan" value="{{$thread->isi}}" class="form-control">

        <br>
        <button type="submit" class="btn btn-primary" name="btnaddpost" >Edit Post</button>
        <br>
        <br>
        <a href="/userVip/forum/{{$thread->Kategori}}"><button type="button">Cancel Edit</button></a>

    </form>
@endsection
