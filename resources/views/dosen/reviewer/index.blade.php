@extends('layouts/main')
@section('container')
@if ($role == 'Reviewer 1')
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 style="text-align:center;">Dashboard Dosen Reviewer 1</h1>
<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="/dosen/reviewer-1/review-proposal" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Review Proposal</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 
    " href="/dosen/downloadJadwalSeminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Jadwal Seminar
        TA 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/reviewer-1/penilaian-seminar" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Penilaian Seminar TA 1</a>
</div>
@else
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 style="text-align:center;">Dashboard Dosen Reviewer 2</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3 
    " href="/dosen/downloadJadwalSeminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Jadwal Seminar
        TA 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/reviewer-2/penilaian-seminar" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Penilaian Seminar TA 1</a>
</div>
@endif
<div class="position-relative">
    <a class="btn my-3
    " href="/dosen" role="button" style="background-color:#ff8c1a; width: 5rem;">Kembali</a>
</div>
@endsection