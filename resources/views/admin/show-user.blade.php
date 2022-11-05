@extends('layouts/main')
@section('container')
<h1 class="mb-5" style="text-align:center;">{{ $title }}</h1>
<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$user->nim}}" disabled>
    </div>
</div>
<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
        @if ($user->mahasiswa)
        <input type="text" class="form-control" value="{{$user->mahasiswa->name}}" disabled>
        @elseif ($user->dosen)
        <input type="text" class="form-control" value="{{$user->dosen->name}}" disabled>
        @elseif ($user->koordinator)
        <input type="text" class="form-control" value="{{$user->koordinator->name}}" disabled>
        @elseif ($user->tatausaha)
        <input type="text" class="form-control" value="{{$user->tatausaha->name}}" disabled>
        @elseif ($user->admin)
        <input type="text" class="form-control" value="{{$user->admin->name}}" disabled>
        @endif
    </div>
</div>
<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$user->role->name}}" disabled>
    </div>
</div>
<div style="height: 200px;"></div>
<div>
    <a class=" btn" href="{{route('kelola-user.index')}}" role="button"
        style="background-color:#ff8c1a; width: 6rem;">Back</a>
</div>
@endsection