@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">Plotting Dosen Pembimbing</h2>
<form class="row my-2" action="/mahasiswa/form-bimbingan/bimbingan-{{$bimbingan_ke}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-4">
            <label for="tanggal_bimbingan" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal_bimbingan" id="tanggal_bimbingan">
        </div>
        <div class="col-8">
            <label for="pokok_materi" class="form-label">Pokok Materi</label>
            <input type="text" class="form-control" name="pokok_materi" id="pokok_materi">
        </div>
    </div>
    <div class="row my-3">
        <div class="form-group">
            <label for="pembahasan_bimbingan">Pembahasan / Hasil / Saran / Tugas</label>
            <textarea class="form-control mt-2" rows="10" id="pembahasan_bimbingan" name="pembahasan_bimbingan"
                id="pembahasan_bimbingan"></textarea>
        </div>
    </div>
    <div class="col-12 mt-5">
        <a class="btn " href="/mahasiswa/form-bimbingan" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type=" submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>
@endsection