@extends('layouts/main')
@section('container')
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 style="text-align:center;">Dashboard Dosen</h1>

<div class="d-flex justify-content-center mt-5">
    <a class="btn my-3
    <?php
    if (!auth()->user()->pembimbing1) {
        echo 'disabled';
    }
    ?>" href="/dosen/pembimbing-1" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen
        Pembimbing 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    " href="/dosen/pembimbing-2" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen Pembimbing 2</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3 
    <?php
    if (!auth()->user()->reviewer1) {
        echo 'disabled';
    } else if (\App\Models\Review::where('r1_id', auth()->user()->reviewer1->id)->count() <= 0) {
        echo 'disabled';
    }
    ?>
    " href="/dosen/reviewer-1" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen Reviewer 1</a>
</div>
<div class="d-flex justify-content-center">
    <a class="btn my-3
    <?php
    if (auth()->user()->reviewer2 && \App\Models\PenilaianSeminar::where('reviewer2_id', auth()->user()->reviewer2->id)->count() <= 0) {
        echo 'disabled';
    }
    ?>
    " href="/dosen/reviewer-2" role="button" style="background-color:#ff8c1a; width: 20rem;">Dosen Reviewer 2</a>
</div>

@endsection