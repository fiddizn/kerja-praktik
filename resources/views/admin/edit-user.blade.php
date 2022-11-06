@extends('layouts/main')
@section('container')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <span>Username tidak berubah / sudah digunakan!</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 class="mb-5" style="text-align:center;">{{ $title }}</h1>
<form action="{{route('kelola-user.update',$user->id)}}" method="post">
    @csrf
    @method('put')
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="nim">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nim" name="nim" value="{{$user->nim}}" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="name">Nama</label>
        <div class="col-sm-10">
            @if ($user->mahasiswa)
            <input type="text" class="form-control" id="name" name="name" value="{{$user->mahasiswa->name}}" required>
            @elseif ($user->dosen)
            <input type="text" class="form-control" id="name" name="name" value="{{$user->dosen->name}}" required>
            @elseif ($user->koordinator)
            <input type="text" class="form-control" id="name" name="name" value="{{$user->koordinator->name}}" required>
            @elseif ($user->tatausaha)
            <input type="text" class="form-control" id="name" name="name" value="{{$user->tatausaha->name}}" required>
            @elseif ($user->admin)
            <input type="text" class="form-control" id="name" name="name" value="{{$user->admin->name}}" required>
            @endif
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="role_id">Role</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="role_id" name="role_id" value="{{$user->role->name}}" readonly
                required>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="password">New Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" autofocus
                placeholder='Masukkan tanda "-" jika tidak akan merubah password' required>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="confirmpassword">Confirm Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="confirmpassword"
                placeholder='Masukkan tanda "-" jika tidak akan merubah password' name="confirmpassword" required>
        </div>
    </div>
    <div style="height: 150px;"></div>
    <div>
        <a class=" btn" href="{{route('kelola-user.index')}}" role="button"
            style="background-color:#ff8c1a; width: 6rem;">Back</a>
        <button onclick="return confirm('Apakah anda yakin ingin mengubah user ini?')" type="submit" class=" btn"
            href="{{route('kelola-user.index')}}" role="button"
            style="background-color:#ff8c1a; width: 6rem;">Submit</button>
    </div>
</form>
@endsection