@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>
<form id="formSeminar" method="post" action="/dosen/reviewer-2/penilaian-seminar/{{ $penilaianSeminar->id }}/edit"
    enctype="multipart/form-data">
    @csrf
    <div class="form-group row mt-4">
        <label for="r2_presentasi" class="col-sm-3 col-form-label">Teknik Presentasi</label>
        <div class="col-sm-3">
            <input required type="number" class="form-control" id="r2_presentasi" name="r2_presentasi"
                placeholder="Skor maksimal 20" min="0" max="20">
        </div>
    </div>
    <div class="form-group row">
        <label for="r2_dokumentasi" class="col-sm-3 col-form-label">Dokumentasi</label>
        <div class="col-sm-3">
            <input required type="number" class="form-control" id="r2_dokumentasi" name="r2_dokumentasi"
                placeholder="Skor maksimal 20" min="0" max="20">
        </div>
    </div>
    <div class="form-group row">
        <label for="r2_rumusanMasalah" class="col-sm-3 col-form-label">Rumusan Masalah</label>
        <div class="col-sm-3">
            <input required type="number" class="form-control" id="r2_rumusanMasalah" name="r2_rumusanMasalah"
                placeholder="Skor maksimal 30" min="0" max="30">
        </div>
    </div>
    <div class="form-group row">
        <label for="r2_metodeDanPustaka" class="col-sm-3 col-form-label">Metode Penelitian dan Pustaka</label>
        <div class="col-sm-3">
            <input required type="number" class="form-control" id="r2_metodeDanPustaka" name="r2_metodeDanPustaka"
                placeholder="Skor maksimal 30" min="0" max="30">
        </div>
    </div>
    <div class="form-group row">
        <label for="r2_catatan" class="col-sm-3 col-form-label">Catatan Seminar</label>
        <div>
            <input id="r2_catatan" type="hidden" name="r2_catatan">
            <trix-editor input="r2_catatan"></trix-editor>
        </div>
    </div>
    <div class="form-group row">
        <label for="r2_file" class="col-sm-3 col-form-label">File Proposal Catatan Revisi</label>
        <div class="col-sm-3">
            <input class="form-control @error('r2_file') is-invalid @enderror" type="file" id="r2_file" name="r2_file">
            <div id="r2_file" class="invalid-feedback">File harus berupa WORD/PDF!</div>
        </div>
    </div>

    <div class="position-relative">
        @if ($penilaianSeminar->r2_presentasi != null)
        <a class="btn my-3" href="/dosen/reviewer-2/penilaian-seminar/{{ $penilaianSeminar->id }}" role="button"
            style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
        @else
        <a class="btn my-3" href="/dosen/reviewer-2/penilaian-seminar" role="button"
            style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
        @endif
        <button type="submit" id="form" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>
<script type="text/javascript" src="/js/catatanSeminarR2.js"></script>
@endsection