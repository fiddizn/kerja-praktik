@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>
<div class="form-group row mt-4">
    <label for="r1_presentasi" class="col-sm-3 col-form-label">Materi (isi) Penelitian</label>
    <div class="col-sm-3">
        <input type="number" class="form-control" id="r1_presentasi" name="r1_presentasi"
            value="{{ $penilaianSeminar->p2_materi }}" disabled>
    </div>
</div>
<div class="form-group row">
    <label for="r1_dokumentasi" class="col-sm-3 col-form-label">Pemahaman Teori Penunjang dan Penelitian</label>
    <div class="col-sm-3">
        <input type="number" class="form-control" id="r1_dokumentasi" name="r1_dokumentasi"
            value="{{ $penilaianSeminar->p2_pemahaman }}" disabled>
    </div>
</div>
<div class="form-group row">
    <label for="r1_rumusanMasalah" class="col-sm-3 col-form-label">Pencapaian Target</label>
    <div class="col-sm-3">
        <input type="number" class="form-control" id="r1_rumusanMasalah" name="r1_rumusanMasalah"
            value="{{ $penilaianSeminar->p2_pencapaian }}" disabled>
    </div>
</div>
<div class="form-group row">
    <label for="r1_metodeDanPustaka" class="col-sm-3 col-form-label">Aspek Kedisiplinan</label>
    <div class="col-sm-3">
        <input type="number" class="form-control" id="r1_metodeDanPustaka" name="r1_metodeDanPustaka"
            value="{{ $penilaianSeminar->p2_kedisiplinan }}" disabled>
    </div>
</div>
<div class="form-group row">
    <label for="r1_catatan" class="col-sm-3 col-form-label">Catatan Seminar</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="r1_catatan" name="r1_catatan"
            value="{{ $penilaianSeminar->p2_catatan }}" disabled>
    </div>
</div>
<div class="form-group row">
    <label for="p2_file" class="col-sm-3 col-form-label">File Proposal Catatan Revisi</label>
    <div class="col-sm-3">
        <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
            href="/dosen/pembimbing-2/penilaian-seminar/{{ $penilaianSeminar->id }}/downloadFile">Download</a>
    </div>
</div>
<div class="position-relative">
    <a class="btn my-3
    " href="/dosen/pembimbing-2/penilaian-seminar" role="button"
        style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
    <a class="btn my-3
    " href="/dosen/pembimbing-2/penilaian-seminar/{{ $penilaianSeminar->id }}/edit" role="button"
        style="background-color:#ff8c1a; width: 5rem;">Update</a>
</div>
@endsection