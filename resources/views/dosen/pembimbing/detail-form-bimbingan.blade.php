@extends('layouts/main')
@section('container')
@if($bimbingan_ke == null)
<h2 class="text-center mb-5">Form Bimbingan</h2>
@else
<h2 class="text-center mb-5">Form Bimbingan {{$bimbingan_ke}}</h2>
@endif
<div class="row">
    <div class="col-4">
        <label for="tanggal_waktu" class="form-label">Tanggal & Waktu</label>
        <input type="text" class="form-control" value="{{ $bimbingan->waktu }}">
    </div>
    <div class="col-8">
        <label for="pokok_materi" class="form-label">Pokok Materi</label>
        <input type="text" class="form-control" value="{{ $bimbingan->pokok_materi }}">
    </div>
</div>
<div class="row my-3">
    <div class="col-4">
        <label for="is_p1" class="form-label">Pembimbing</label>
        @if($role == 'Pembimbing 1')
        <input type="text" class="form-control" value="{{ $bimbingan->bimbingan->pembimbing1->dosen->name }}">
        @elseif ($role == 'Pembimbing 2')
        <input type="text" class="form-control" value="{{ $bimbingan->bimbingan->pembimbing2->dosen->name }}">
        @endif
    </div>
</div>
<div class="row my-3">
    <div class="form-group">
        <label for="pembahasan_bimbingan" class="mb-2">Pembahasan / Hasil / Saran / Tugas</label>
        <div class="card w-100">
            <div class="card-body">
                {!! $bimbingan->pembahasan !!}
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-3 ">
    @if($role == 'Pembimbing 1')
    <form method="post" action="/dosen/pembimbing-1/form-bimbingan/{{$mahasiswa_id}}/bimbingan-{{$bimbingan_ke}}">
        @csrf
        <input type="hidden" id="setuju" name="setuju" value="1">
        <button type="submit" class="btn btn-success mx-2" style="width: 10rem; height: 3rem;">Setuju</button>
    </form>
    <form method="post" action="/dosen/pembimbing-1/form-bimbingan/{{$mahasiswa_id}}/bimbingan-{{$bimbingan_ke}}">
        @csrf
        <input type="hidden" id="setuju" name="setuju" value="0">
        <button type="submit" class="btn btn-danger mx-2" style="width: 10rem; height: 3rem;">Tolak</button>
    </form>
    @elseif ($role == 'Pembimbing 2')
    <form method="post" action="/dosen/pembimbing-2/form-bimbingan/{{$mahasiswa_id}}/bimbingan-{{$bimbingan_ke}}">
        @csrf
        <input type="hidden" id="setuju" name="setuju" value="1">
        <button type="submit" class="btn btn-success mx-2" style="width: 10rem; height: 3rem;">Setuju</button>
    </form>
    <form method="post" action="/dosen/pembimbing-2/form-bimbingan/{{$mahasiswa_id}}/bimbingan-{{$bimbingan_ke}}">
        @csrf
        <input type="hidden" id="setuju" name="setuju" value="0">
        <button type="submit" class="btn btn-danger mx-2" style="width: 10rem; height: 3rem;">Tolak</button>
    </form>
    @endif
</div>
<div class="col-12 mt-5">
    @if($role == 'Pembimbing 1')
    <a class="btn " href="/dosen/pembimbing-1/form-bimbingan/{{$mahasiswa_id}}" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    @elseif ($role == 'Pembimbing 2')
    <a class="btn " href="/dosen/pembimbing-2/form-bimbingan/{{$mahasiswa_id}}" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    @endif
</div>
</form>
@endsection