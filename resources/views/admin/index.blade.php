@extends('layouts/main')
@section('container')
<h1 style="text-align:center;">{{ $title }}</h1>
<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="{{ route('kelola-user.index') }}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Kelola User</a>
</div>
@endsection