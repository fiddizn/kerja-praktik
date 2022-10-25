@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>
<form method="post" action="/dosen/pembimbing-1/penilaian-seminar/{{ $penilaianSeminar->id }}/edit"
    enctype="multipart/form-data">
    @csrf
    <div class="form-group row mt-4">
        <label for="p1_materi" class="col-sm-3 col-form-label">Materi (isi) Penelitian</label>
        <div class="col-sm-3">
            <input type="number" class="form-control" id="p1_materi" name="p1_materi" placeholder="Skor maksimal 20"
                min="0" max="20">
        </div>
    </div>
    <div class="form-group row">
        <label for="p1_pemahaman" class="col-sm-3 col-form-label">Pemahaman Teori Penunjang dan
            Penelitian</label>
        <div class="col-sm-3">
            <input type="number" class="form-control" id="p1_pemahaman" name="p1_pemahaman"
                placeholder="Skor maksimal 20" min="0" max="20">
        </div>
    </div>
    <div class="form-group row">
        <label for="p1_pencapaian" class="col-sm-3 col-form-label">Pencapaian Target</label>
        <div class="col-sm-3">
            <input type="number" class="form-control" id="p1_pencapaian" name="p1_pencapaian"
                placeholder="Skor maksimal 30" min="0" max="30">
        </div>
    </div>
    <div class="form-group row">
        <label for="p1_kedisiplinan" class="col-sm-3 col-form-label">Aspek Kedisiplinan</label>
        <div class="col-sm-3">
            <input type="number" class="form-control" id="p1_kedisiplinan" name="p1_kedisiplinan"
                placeholder="Skor maksimal 30" min="0" max="30">
        </div>
    </div>
    <div class="form-group row">
        <label for="p1_catatan" class="col-sm-3 col-form-label">Catatan Seminar</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="p1_catatan" name="p1_catatan">
        </div>
    </div>
    <div class="form-group row">
        <label for="p1_file" class="col-sm-3 col-form-label">File Proposal Catatan Revisi</label>
        <div class="col-sm-3">
            <input class="form-control" type="file" id="p1_file" name="p1_file">
        </div>
    </div>

    <div class="position-relative">
        @if ($penilaianSeminar->p1_materi != null)
        <a class="btn my-3" href="/dosen/pembimbing-1/penilaian-seminar/{{ $penilaianSeminar->id }}" role="button"
            style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
        @else
        <a class="btn my-3" href="/dosen/pembimbing-1/penilaian-seminar" role="button"
            style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
        @endif
        <button type="submit" id="form" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>
@endsection