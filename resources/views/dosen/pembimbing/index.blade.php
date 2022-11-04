@extends('layouts/main')
@section('container')
@if ($role == 'Pembimbing 1')
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 style="text-align:center;">Dashboard Dosen Pembimbing</h1>
<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="{{route('ajuan-pembimbing-1.index')}}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Ajuan
        Pembimbing</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3" href="{{route('review-p1-index')}}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Review Proposal</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/pembimbing-1/form-bimbingan" role="button" style="background-color:#ff8c1a; width: 20rem;">Bimbingan
        Mahasiswa</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 
    " href="/dosen/downloadJadwalSeminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Jadwal Seminar
        TA 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/pembimbing-1/penilaian-seminar" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Penilaian Seminar TA 1</a>
</div>

<div class="position-relative">
    <a class="btn my-3
    " href="/dosen" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
</div>

@else
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 style="text-align:center;">Dashboard Dosen Pembimbing</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="{{route('ajuan-pembimbing-2.index')}}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Ajuan
        Pembimbing</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/pembimbing-2/form-bimbingan" role="button" style="background-color:#ff8c1a; width: 20rem;">Bimbingan
        Mahasiswa</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 
    " href="/dosen/downloadJadwalSeminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Jadwal Seminar
        TA 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/pembimbing-2/penilaian-seminar" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Penilaian Seminar TA 1</a>
</div>

<div class="position-relative">
    <a class="btn my-3
    " href="/dosen" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
</div>
@endif
@endsection