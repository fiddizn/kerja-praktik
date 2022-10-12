@extends('layouts/main')
@section('container')

<h2 class="text-center">{{ $title }}</h2>
<div class="row align-items-start">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row mt-2 px-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim" readonly
                    value="{{ $mahasiswa->mahasiswa->nim }}">
            </div>
            <div class="row mt-2 px-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="name" id="name" readonly
                    value="{{ $mahasiswa->mahasiswa->name }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mt-2 px-3">
                <label for="nim" class="form-label">NID</label>
                <input type="number" class="form-control" name="nim" id="nim" readonly
                    value="{{ $mahasiswa->reviewer1->dosen->nid }}">
            </div>
            <div class="row mt-2 px-3"><label for="name" class="form-label">Nama Dosen Reviewer</label>
                <input type="text" class="form-control" name="name" id="name" readonly
                    value="{{ $mahasiswa->reviewer1->dosen->name }}">
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-around mt">
    <div class="input-group my-5" style="width: 30%;">
        <div class="input-group-prepend">
            <a href="/koordinator/hasil-review-proposal/{{ $mahasiswa->pendaftaran->id }}/downloadProposalReviewed"
                class="btn" style="height:auto; background-color:#ff8c1a;">
                <i class="fa-solid fa-download fa-xl"></i>
                <h5><b>Unduh Proposal (Reviewed)</b></h5>
            </a>
        </div>
    </div>
</div>
<div class="row mt-2">
    <a class="btn" href="/koordinator/hasil-review-proposal" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
<div style=" height: 100px;">
</div>
@endsection