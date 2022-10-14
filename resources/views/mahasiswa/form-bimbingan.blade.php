@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">Form Bimbingan</h2>
@foreach ($bimbingans as $key=>$bimbingan)
<div class="d-flex justify-content-center">
    <a class="btn my-2" href="/mahasiswa/form-bimbingan/{{$key+1}}" role="button"
        style="background-color:#ff8c1a; width: 20rem;">Bimbingan {{$key+1}}</a>
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