@extends('layouts/main')
@section('container')

<h1 style="text-align:center;">Dashboard Dosen Reviewer</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="/dosen/reviewer-1/review-proposal" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Review Proposal</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 disabled
    " href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Berkas Proposal Final</a>
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
@endsection