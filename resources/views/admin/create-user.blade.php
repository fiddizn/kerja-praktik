@extends('layouts/main')
@section('container')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <span>Username tidak berubah / sudah digunakan!</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 class="mb-5" style="text-align:center;">{{ $title }}</h1>
<form action="{{route('kelola-user.store')}}" method="post">
    @csrf
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="nim">Username</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="nim" name="nim" placeholder="Enter username.." required>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="name">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name.." required>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="role_id">Role</label>
        <div class="col-sm-10">
            <select class="form-select" id="role_id" name="role_id">
                <option selected disabled>Pilih..</option>
                @foreach ($roles as $key=>$role)
                <option value="{{ $key }}">{{ $role }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="password">Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter password.."
                required>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="confirmpassword">Confirm Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="confirmpassword" name="confirmpassword"
                placeholder="Enter password.." required>
        </div>
    </div>
    <div style="height: 150px;"></div>
    <div>
        <a class=" btn" href="{{route('kelola-user.index')}}" role="button"
            style="background-color:#ff8c1a; width: 6rem;">Back</a>
        <button type="submit" class=" btn" style="background-color:#ff8c1a; width: 6rem;">Submit</button>
    </div>
</form>
@endsection