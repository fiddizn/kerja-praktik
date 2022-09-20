@extends('layouts/main')
@section('container')

<h1 style="text-align:center;">Sistem Informasi Tugas Akhir 1</h1>
<div class=" row mt-5">
    <div class="col-md-6">
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="koordinator/list-pendaftaran-ta-1" role="button"
                style="background-color:#ff8c1a; width: 20rem;">Pendaftaran TA 1</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Plotting Dosen
                Pembimbing</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Plotting Dosen
                Reviewer</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Hasil Review
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
            <a class="btn my-3" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Plotting Dosen
                Penguji</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Jadwal
                Seminar</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn my-3" href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Penilaian
                Seminar</a>
        </div>
    </div>
</div>


@endsection