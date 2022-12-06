@extends('templateAdmin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Member</h1>
        <form action="{{url('/admin/listmember')}}" method="POST">
            @csrf
            <div class="form-outline">
                <label class="form-label" for="form1">Search</label>
                <input type="search" name="search" placeholder="Insert Name or Email">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
            <br>
            <table class="table table-dark table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Umur</th>
                    <th>Role</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse ($listUser as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->umur }}</td>
                        @if ($user->role == 0)
                            <td><p style="color: cyan">User Reguler</p></td>

                        @elseif ($user->role == 1)
                            <td><p style="color: gold">User VIP</p></td>
                        @endif

                        @if ($user->status == 1)
                            <td><p style="color: lightgreen">Active</p></td>
                        @else
                            <td><p style="color: red">Deactived</p></td>
                        @endif

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada user!</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
    </div>
</main>
@endsection
