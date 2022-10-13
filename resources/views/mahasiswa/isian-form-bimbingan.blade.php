@extends('layouts/main')
@section('container')

<h2 class="text-center mb-5">Form Bimbingan</h2>
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
            <input id="pembahasan_bimbingan" type="hidden" name="pembahasan_bimbingan">
            <trix-editor input="pembahasan_bimbingan"></trix-editor>
        </div>
    </div>
    <div class="col-12 mt-5">
        <a class="btn " href="/mahasiswa/form-bimbingan" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type=" submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
</form>

<script>
document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault
})
</script>
@endsection