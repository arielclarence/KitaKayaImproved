@extends('templateCs')
@section('content')
    <h1 class="mt-4">Forum</h1>
    <table class="table table-dark table-striped">
        <thead>
        <th>Nama Kategori</th>
        <th>Forum</th>

        </thead>
        <tbody>

            <?php
                foreach($videos as $video){
                    ?>
                    <tr>
                        <td><?=  $video->nama?></td>
                        <td><a href="{{ route('detailforumcs', $video->id) }}" class="btn btn-primary">Detail</a></td>

                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
@endsection
