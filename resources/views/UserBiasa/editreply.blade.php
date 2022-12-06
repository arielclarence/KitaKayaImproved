@extends('templateHome')
@section('content')



    <form class="form-horizontal" action="{{ route('editreplyforumbiasa', $comment->id) }}" method="POST">
        @csrf
        <h1>Reply</h1>

        <input type="text" name="isi" placeholder="Isi Yang ingin disampaikan" value="{{$comment->isi}}" class="form-control">

        <br>
        <button type="submit" class="btn btn-primary" name="btnaddpost" >Edit Reply</button>
        <br>
        <br>
        <a href="/userBiasa/forum/{{$idforum}}"><button type="button">Cancel Edit</button></a>

    </form>
@endsection
