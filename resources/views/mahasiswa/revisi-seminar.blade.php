@extends('layouts/main')
@section('container')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center mb-5">{{ $title }}</h2>
@if ($penilaianseminar->r1_catatan == null && $penilaianseminar->r2_catatan == null && $penilaianseminar->p1_catatan ==
null && $penilaianseminar->p2_catatan == null)
<div class="container">
    <div class="d-flex justify-content-center mt-5">
        <div class="card w-50 my-5 " style="background-color:#D9D9D9;">
            <div class=" card-body my-5">
                <h3 class="card-title" style="text-align: center;">Revisi seminar belum dirilis</h3>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row align-items-start">
        <div class="col-6">
            <h3 class="text-center mb-3">Pembimbing 1</h3>
            <label class="form-label">Catatan Seminar</label>
            <div class="card mb-3">
                <div class="card-body">
                    {!! $penilaianseminar->p1_catatan !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <h3 class="text-center mb-3">Pembimbing 2</h3>
            <label class="form-label">Catatan Seminar</label>
            <div class="card mb-3">
                <div class="card-body">
                    {!! $penilaianseminar->p2_catatan !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <h3 class="text-center mb-3">Reviewer 1</h3>
            <label class="form-label">Catatan Seminar</label>
            <div class="card mb-3">
                <div class="card-body">
                    {!! $penilaianseminar->r1_catatan !!}
                </div>
                <a class="btn rounded-0 rounded-bottom" style="background-color:#ff8c1a;"
                    href="/mahasiswa/revisi-seminar/downloadFileR1" role="button"><i class="fa-solid fa-download"></i>
                    Download File
                    Proposal</a>
            </div>
        </div>
        <div class="col-6">
            <h3 class="text-center mb-3">Reviewer 2</h3>
            <label class="form-label">Catatan Seminar</label>
            <div class="card mb-3">
                <div class="card-body">
                    {!! $penilaianseminar->r2_catatan !!}
                </div>
                <a class="btn rounded-0 rounded-bottom" style="background-color:#ff8c1a;"
                    href="/mahasiswa/revisi-seminar/downloadFileR2" role="button"><i class="fa-solid fa-download"></i>
                    Download File
                    Proposal</a>
            </div>
        </div>
    </div>
</div>
@endif
<div>
    <a class="btn my-3" href="/mahasiswa" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
    @if (auth()->user()->proposalhasilrevisi == null)
    <a class="btn my-3" href="/mahasiswa/revisi-seminar/create" role="button" style="background-color:#ff8c1a;">Upload
        Revisi</a>
    @else
    <a class="btn my-3" href="/mahasiswa/revisi-seminar/create" role="button" style="background-color:#ff8c1a;">Update
        Revisi</a>
    @endif
</div>
@endsection