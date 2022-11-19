@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">Form Bimbingan</h2>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-center">
    <a class="btn my-3 mx-2" href="/mahasiswa/form-bimbingan/pembimbing-1" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Pembimbing 1</a>
    <a class="btn my-3 mx-2" href="/mahasiswa/form-bimbingan/pembimbing-2" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Pembimbing 2</a>
</div>

<div class="col-12 mt-5">
    <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@endsection