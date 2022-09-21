@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">Form Bimbingan</h2>

<?php
for ($x = 1; $x <= 5; $x++) {
    echo
    '
    <div class="d-flex justify-content-center">
    <a class="btn my-2" href="/mahasiswa/form-bimbingan/bimbingan-' . $x . '" role="button" style="background-color:#ff8c1a; width: 20rem;">Bimbingan ' . $x . '</a>
    </div>
    ';
}
?>
<div class="d-flex justify-content-center">
    <a class="btn my-2" href="#" role="button" style="background-color:#ff8c1a;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
    </a>
</div>

<div class="col-12 mt-5">
    <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@endsection