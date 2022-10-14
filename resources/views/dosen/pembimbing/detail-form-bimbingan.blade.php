@extends('layouts/main')
@section('container')
@if($bimbingan_ke == null)
<h2 class="text-center mb-5">Form Bimbingan</h2>
@else
<h2 class="text-center mb-5">Form Bimbingan {{$bimbingan_ke}}</h2>
@endif
@if($bimbingan_ke == null)
<form class="row my-2" action="{{ route('form-bimbingan.store') }}" method="POST">
    @else
    <form class="row my-2" action="/mahasiswa/form-bimbingan/{{$bimbingan_ke}}" method="POST">
        @method('put')
        @endif
        @csrf
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
                <input type="text" class="form-control" value="{{ $bimbingan->bimbingan->pembimbing1->dosen->name }}">
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
        <div class="col-12 mt-5">
            <a class="btn " href="/dosen/pembimbing-1/{{$mahasiswa_id}}" role="button"
                style="width: 5rem;background-color:#ff8c1a;">Back</a>
            <button type=" submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Update</button>
        </div>
    </form>
    @endsection