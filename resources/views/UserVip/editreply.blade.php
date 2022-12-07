@extends('templatehomevip')
@section('content')



    <form class="form-horizontal" action="{{ route('editreplyforumvip', $comment->id) }}" method="POST">
        @csrf
        <h1>Reply</h1>

        <input type="text" name="isi" placeholder="Isi Yang ingin disampaikan" value="{{$comment->isi}}" class="form-control">

        <br>
        <button type="submit" class="btn btn-primary" name="btnaddpost" >Edit Reply</button>
        <br>
        <br>
        <a href="/userVip/forum/{{$comment->thread}}/detail"><button type="button" class="btn btn-danger">Cancel Edit</button></a>

    </form>
@endsection
