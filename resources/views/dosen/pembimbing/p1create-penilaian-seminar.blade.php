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
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group row mt-4">
                <label for="p1_materi" class="col-sm-9 col-form-label">Materi (isi) Penelitian</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_materi" name="p1_materi" min="0" max="20"
                        placeholder="Maks. 20">
                </div>
            </div>
            <div class="form-group row">
                <label for="p1_pemahaman" class="col-sm-9 col-form-label">Pemahaman Teori Penunjang dan
                    Penelitian</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_pemahaman" name="p1_pemahaman" min="0" max="20"
                        placeholder="Maks. 20">
                </div>
            </div>
            <div class="form-group row">
                <label for="p1_pencapaian" class="col-sm-9 col-form-label">Pencapaian Target</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_pencapaian" name="p1_pencapaian" min="0" max="30"
                        placeholder="Maks. 30">
                </div>
            </div>
            <div class="form-group row">
                <label for="p1_kedisiplinan" class="col-sm-9 col-form-label">Aspek Kedisiplinan</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_kedisiplinan" name="p1_kedisiplinan" min="0"
                        max="30" placeholder="Maks. 30">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row mt-4">
                <label for="p1_presentasi" class="col-sm-9 col-form-label">Teknik Presentasi</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_presentasi" name="p1_presentasi" min="0" max="20"
                        placeholder="Maks. 20">
                </div>
            </div>
            <div class="form-group row">
                <label for="p1_dokumentasi" class="col-sm-9 col-form-label">Dokumentasi</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_dokumentasi" name="p1_dokumentasi" min="0" max="20"
                        placeholder="Maks. 20">
                </div>
            </div>
            <div class="form-group row">
                <label for="p1_rumusanMasalah" class="col-sm-9 col-form-label">Rumusan Masalah</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_rumusanMasalah" name="p1_rumusanMasalah" min="0"
                        max="30" placeholder="Maks. 30">
                </div>
            </div>
            <div class="form-group row">
                <label for="p1_metodeDanPustaka" class="col-sm-9 col-form-label">Metode Penelitian dan Pustaka</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p1_metodeDanPustaka" name="p1_metodeDanPustaka"
                        min="0" max="30" placeholder="Maks. 30">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="p1_catatan" class="col-sm-3 col-form-label">Catatan Seminar</label>
            <div>
                <input id="p1_catatan" type="hidden" name="p1_catatan">
                <trix-editor input="p1_catatan"></trix-editor>
            </div>
        </div>
        <div class="form-group row">
            <label for="p1_file" class="col-sm-4 col-form-label">File Proposal Catatan Revisi</label>
            <div class="">
                <input class="form-control" type="file" id="p1_file" name="p1_file">
            </div>
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