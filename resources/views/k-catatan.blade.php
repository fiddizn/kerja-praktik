@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Seleksi Adiministrasi</h2>
<form action="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}" method="post">
    @csrf
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
    <div class="row g-3 my-3">
        <div class="form-group">
            @if ($status_kelolosan == 'tidak-lolos')
            <label for="keterangan_status">Mahasiswa di atas dinyatakan <b>tidak lolos</b> seleksi administrasi dengan
                alasan:</label>
            <input id="keterangan_status" type="hidden" name="keterangan_status">
            <trix-editor input="keterangan_status"></trix-editor>
            <input type="hidden" id="status" name="status" value="Tidak Lolos">
            @else
            <label for="keterangan_status">Mahasiswa di atas dinyatakan <b>lolos seleksi</b> administrasi dengan
                <b>syarat</b>sebagai berikut:</label>
            <input id="keterangan_status" type="hidden" name="keterangan_status">
            <trix-editor input="keterangan_status"></trix-editor>
            <input type="hidden" id="status" name="status" value="Lolos Bersyarat">
            @endif
        </div>
    </div>
    <div class="col-12 mt-5">
        <a class="btn" href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type="submit" class="btn" style="width: 5rem;background-color:#ff8c1a;">Submit</button>
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