@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">Form Bimbingan</h2>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@foreach ($bimbingans as $key=>$bimbingan)
<div class="d-flex justify-content-center">
    <a class="btn my-2" href="/mahasiswa/form-bimbingan/{{$key+1}}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Bimbingan {{$key+1}}
        @if(is_null($bimbingan->setuju))
        @elseif ($bimbingan->setuju == 1)
        <i class="fa-solid fa-square-check"></i>
        @else ($bimbingan->setuju == 0)
        <i class="fa-solid fa-square-xmark"></i>
        @endif
    </a>
</div>
@endforeach

<div class="d-flex justify-content-center">
    <a class="btn my-2" href="/mahasiswa/form-bimbingan/create" role="button" style="background-color:#ff8c1a;">
        <i class="fa-solid fa-plus"></i>
    </a>
</div>

<div class="col-12 mt-5">
    <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@endsection