@extends('templateCs')
@section('content')
<main>
    @include('sweetalert::alert')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Forum</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Customer Service</li>
        </ol>
        <br>
        <div style="height: 100vh"></div>
    </div>
</main>
@endsection
