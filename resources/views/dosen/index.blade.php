@extends('layouts/main')
@section('container')

<h1 style="text-align:center;">Dashboard Dosen</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3" href="/dosen/pembimbing-1" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen
        Pembimbing 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/pembimbing-2" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen Pembimbing 2</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 
    " href="/dosen/reviewer-1" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen Reviewer 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 disabled
    " href="#" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen Reviewer 2</a>
</div>

@endsection