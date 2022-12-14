@extends('layouts/main')
@section('container')

<h1 style="text-align:center;">Sistem Informasi Tugas Akhir 1</h1>
<div class=" row mt-5">
    <div class="col-md-6">
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="koordinator/list-pendaftaran-ta-1" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Pendaftaran Administrasi TA 1</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="/koordinator/plotting-dosen-pembimbing" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Plotting Dosen
                Pembimbing</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="/koordinator/plotting-dosen-reviewer" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Plotting Dosen
                Reviewer</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="/koordinator/hasil-review-proposal" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Hasil Review
                Proposal</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="/koordinator/list-pendaftaran-seminar-ta-1" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Pendaftaran
                Seminar TA 1</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="/koordinator/plotting-dosen-reviewer2" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Plotting Dosen
                Penguji</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="/koordinator/jadwal-seminar" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Jadwal
                Seminar</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="/koordinator/penilaian-seminar" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Penilaian
                Seminar</a>
        </div>
    </div>
</div>


@endsection