@extends('layouts/main')
@section('container')
<h1 class="text-center">{{ $title }}</h1>
<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3 
    " href="/tu/pendaftaran-administrasi" role="button" style="background-color:#ff8c1a; width: 20rem;">Pendaftaran
        Administrasi</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 
    " href="/tu/pendaftaran-seminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Pendaftaran
        Seminar</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 
    " href="/tu/penilaian-seminar" role="button" style="background-color:#ff8c1a; width: 20rem;">Penilaian
        Seminar</a>
</div>
@endsection