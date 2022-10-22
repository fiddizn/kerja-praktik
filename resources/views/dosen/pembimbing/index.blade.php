@extends('layouts/main')
@section('container')
@if ($role == 'Pembimbing 1')
<h1 style="text-align:center;">Dashboard Dosen Pembimbing</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3 disabled" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Ajuan
        Pembimbing</a>
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
    <a class="btn my-3 disabled
    " href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Penilaian Seminar TA 1</a>
</div>

<div class="position-relative">
    <a class="btn my-3
    " href="/dosen" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
</div>

@else

<h1 style="text-align:center;">Dashboard Dosen Pembimbing</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3 disabled" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Ajuan
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
    <a class="btn my-3 disabled
    " href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Penilaian Seminar TA 1</a>
</div>

<div class="position-relative">
    <a class="btn my-3
    " href="/dosen" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
</div>
@endif
@endsection