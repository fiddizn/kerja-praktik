@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>
<form method="post" action="/dosen/pembimbing-2/penilaian-seminar/{{ $penilaianSeminar->id }}/edit"
    enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group row mt-4">
                <label for="p2_materi" class="col-sm-9 col-form-label">Materi (isi) Penelitian</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_materi" name="p2_materi" min="0" max="20"
                        placeholder="Maks. 20" value="{{ $penilaianSeminar->p2_materi }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="p2_pemahaman" class="col-sm-9 col-form-label">Pemahaman Teori Penunjang dan
                    Penelitian</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_pemahaman" name="p2_pemahaman" min="0" max="20"
                        placeholder="Maks. 20" value="{{ $penilaianSeminar->p2_pemahaman }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="p2_pencapaian" class="col-sm-9 col-form-label">Pencapaian Target</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_pencapaian" name="p2_pencapaian" min="0" max="30"
                        placeholder="Maks. 30" value="{{ $penilaianSeminar->p2_pencapaian }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="p2_kedisiplinan" class="col-sm-9 col-form-label">Aspek Kedisiplinan</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_kedisiplinan" name="p2_kedisiplinan" min="0"
                        max="30" placeholder="Maks. 30" value="{{ $penilaianSeminar->p2_kedisiplinan }}">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row mt-4">
                <label for="p2_presentasi" class="col-sm-9 col-form-label">Teknik Presentasi</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_presentasi" name="p2_presentasi" min="0" max="20"
                        placeholder="Maks. 20" value="{{ $penilaianSeminar->p2_presentasi }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="p2_dokumentasi" class="col-sm-9 col-form-label">Dokumentasi</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_dokumentasi" name="p2_dokumentasi" min="0" max="20"
                        placeholder="Maks. 20" value="{{ $penilaianSeminar->p2_dokumentasi }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="p2_rumusanMasalah" class="col-sm-9 col-form-label">Rumusan Masalah</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_rumusanMasalah" name="p2_rumusanMasalah" min="0"
                        max="30" placeholder="Maks. 30" value="{{ $penilaianSeminar->p2_rumusanMasalah }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="p2_metodeDanPustaka" class="col-sm-9 col-form-label">Metode Penelitian dan Pustaka</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="p2_metodeDanPustaka" name="p2_metodeDanPustaka"
                        min="0" max="30" placeholder="Maks. 30" value="{{ $penilaianSeminar->p2_metodeDanPustaka }}">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="p2_catatan" class="col-sm-3 col-form-label">Catatan Seminar</label>
            <div>
                <input id="p2_catatan" type="hidden" name="p2_catatan">
                <trix-editor input="p2_catatan"></trix-editor>
            </div>
        </div>
        <div class="form-group row">
            <label for="p2_file" class="col-sm-4 col-form-label">File Proposal Catatan Revisi</label>
            <div class="">
                <input class="form-control" type="file" id="p2_file" name="p2_file">
            </div>
        </div>
    </div>
    <div class="position-relative">
        <a class="btn my-3" href="/dosen/pembimbing-2/penilaian-seminar/{{ $penilaianSeminar->id }}" role="button"
            style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
        <button type="submit" id="form" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>
@endsection