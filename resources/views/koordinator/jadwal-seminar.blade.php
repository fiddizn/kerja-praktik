@extends('layouts/main')
@section('container')

<h2 class="text-center">Jadwal Seminar</h2>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($jadwal == null)
<form action="/koordinator/jadwal-seminar" method="post" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-around mt-5">
        <div>
            <label for="mahasiswa" class="form-label" style="text-align: center;">Jadwal Seminar Mahasiswa</label>
            <input class="form-control form-control" type="file" id="mahasiswa" name="mahasiswa">
        </div>
        <div>
            <label for="dosen" class="form-label">Jadwal Seminar Dosen</label>
            <input class="form-control form-control" type="file" id="dosen" name="dosen">
        </div>
    </div>
    <div style="height:230px;">
    </div>
    <div class="col-12 mt-5">
        <a class="btn" href="/koordinator" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>
@else

<form action="/koordinator/jadwal-seminar/update" method="post" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-around mt-5">
        <div class="col-md-5">
            <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                href="/koordinator/jadwal-seminar/mahasiswa">Mahasiswa <i class="fa-solid fa-download"></i>
            </a>
            <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                href="/koordinator/jadwal-seminar/dosen">Dosen <i class="fa-solid fa-download"></i>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-around mt-5">
        <div>
            <label for="mahasiswa" class="form-label" style="text-align: center;">Jadwal Seminar Mahasiswa
                (Update)</label>
            <input class="form-control form-control" type="file" id="mahasiswa" name="mahasiswa">
        </div>
        <div>
            <label for="dosen" class="form-label">Jadwal Seminar Dosen (Update)</label>
            <input class="form-control form-control" type="file" id="dosen" name="dosen">
        </div>
    </div>
    <div style="height:230px;">
    </div>
    <div class="col-12 mt-5">
        <a class="btn" href="/koordinator" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>
@endif
@endsection