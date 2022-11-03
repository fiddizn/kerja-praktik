@extends('layouts/main')
@section('container')

@if(session()->has('gagal'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 style="text-align:center;">Sistem Informasi Tugas Akhir 1</h1>
<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="/mahasiswa/pendaftaran-ta-1-step1" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Pendaftaran Administrasi TA 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    @if($hasilReview == null)
    disabled
    @endif
    " href="/mahasiswa/hasil-review" role="button" style="background-color:#ff8c1a; width: 20rem;">Hasil Review</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    @if($formBimbingan == null)
    disabled
    @endif
    " href="/mahasiswa/form-bimbingan" role="button" style="background-color:#ff8c1a; width: 20rem;">Form Bimbingan</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    @if($formBimbingan == null)
    disabled
    @endif
    " href="/mahasiswa/pendaftaran-seminar-ta-1" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Pendaftaran
        Seminar TA
        1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    @if(auth()->user()->penilaianSeminar->rilis == 0)
    disabled
    @endif
    " href="/mahasiswa/revisi-seminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Revisi Seminar</a>
</div>
@endsection