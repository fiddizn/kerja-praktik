@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Penilaian</h2>

<div class="row align-items-start mt-2">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly
                value="{{ $pendaftaran->mahasiswa->nim }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $pendaftaran->mahasiswa->name }}">
        </div>
    </div>
</div>
<form id="formPenilaian" action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}/penilaian"
    method="post">
    @csrf
    <div class="row g-3 my-3">
        <div class="form-group">

            <div class="row mt-1">
                <label for="penilaian">Nilai Pendaftaran Seminar</label>
            </div>
            <div class="row">
                <div class="col">
                    <input type="number" min="0" max="100" class="form-control" id="penilaian" name="penilaian"
                        placeholder="Masukkan Nilai" required>
                </div>
                <!-- <div class="col-md-2">
                        <button type="submit" class="btn"
                            style="width: 10rem; background-color:#ff8c1a;">Submit</button>
                    </div> -->
            </div>

            <div class="col-12 mt-5">
                <a class="btn" href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}" role="button"
                    style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" id="formPenilaian" class="btn"
                    style="width: 5rem;background-color:#ff8c1a;">Submit</button>
            </div>
        </div>
    </div>
</form>

<div style=" height: 100px;">
</div>

<script>
document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault
})
</script>

@endsection