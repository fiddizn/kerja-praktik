@extends('layouts/main')
@section('container')

<h1 style="text-align:center;">Sistem Informasi Tugas Akhir 1</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="mahasiswa/pendaftaran-ta-1" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Pendaftaran TA 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3" href="/mahasiswa/hasil-review" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Hasil Review</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3" href="/mahasiswa/form-bimbingan" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Form Bimbingan</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3" href="/mahasiswa/pendaftaran-seminar-ta-1" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Pendaftaran
        Seminar TA
        1</a>
</div>
@endsection