@extends('layouts/main')
@section('container')
@if (session()->has('null'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('null') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">{{ $title }}</h2>

<div class="row mt-5">
    <div class="d-flex justify-content-around">
        <div class="col-sm-6">
            <label>Saran Perbaikan / Usulan Judul / DLL</label>
            <div class="card w-100">
                <div class="card-body">
                    @if ($review->rilis == 1)
                    {!! $review->p1_komentar !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <label>Saran Perbaikan / Usulan Judul / DLL</label>
            <div class="card w-100">
                <div class="card-body">
                    @if ($review->rilis == 1)
                    {!! $review->r1_komentar !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-around">
    <div class="input-group my-5" style="width: 30%;">
        <div class="input-group-prepend">
            <a href="/mahasiswa/hasil-review/download-proposal-p1-{{$review_id}}" class="btn"
                style="height: 58px; background-color:#ff8c1a;">
                <i class="fa-solid fa-download fa-xl"></i>
                <p><b>Download Proposal (Reviewed by {{ auth()->user()->review->pembimbing1->dosen->kode }})</b></p>
            </a>
        </div>
    </div>
    <div class="input-group my-5" style="width: 30%;">
        <div class="input-group-prepend">
            <a href="/mahasiswa/hasil-review/download-proposal-r1-{{$review_id}}" class="btn"
                style="height: 58px; background-color:#ff8c1a;">
                <i class="fa-solid fa-download fa-xl"></i>
                <p><b>Download Proposal (Reviewed by {{ auth()->user()->review->reviewer1->dosen->kode }})</b></p>
            </a>
        </div>
    </div>
</div>
<div>
    <a class="btn" href="/mahasiswa" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
</div>

@endsection