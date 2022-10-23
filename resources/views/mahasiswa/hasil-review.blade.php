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
    <div class="d-flex justify-content-center">
        <label>Saran Perbaikan / Usulan Judul / DLL</label>
        <div class="card w-100">
            <div class="card-body">
                @if ($review->rilis != 0)
                {!! $review->komentar !!}
                @endif
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-around">
    <div class="input-group my-5" style="width: 30%;">
        <div class="input-group-prepend">
            <a href="/mahasiswa/hasil-review/download-proposal-{{$review_id}}" class="btn"
                style="height: 58px; background-color:#ff8c1a;">
                <i class="fa-solid fa-download fa-xl"></i>
                <p><b>DOWNLOAD PROPOSAL (REVIEWED)</b></p>
            </a>
        </div>
    </div>
</div>
<div>
    <a class="btn" href="/mahasiswa" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
</div>

@endsection