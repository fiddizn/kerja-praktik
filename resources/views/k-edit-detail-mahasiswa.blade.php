@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Edit Pendaftaran Mahasiswa</h2>

<form method="post" action="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}">
    @method('put')
    @csrf
    <div class="row align-items-start mt-3">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim"
                    value="{{ $pendaftaran->mahasiswa->nim }}">
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" name="gender" id="gender" value="{{ $pendaftaran->gender }}">
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ $pendaftaran->mahasiswa->name }}">
            </div>
            <div class="col-md-6">
                <label for="peminatan" class="form-label">Peminatan</label>
                <input type="text" class="form-control" name="peminatan" id="peminatan"
                    value="{{ $pendaftaran->peminatan }}">
            </div>
            <div class="col-md-6">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                    value="{{ $pendaftaran->tempat_lahir }}">
            </div>
            <div class="col-md-6">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="number" class="form-control" name="angkatan" id="angkatan"
                    value="{{ $pendaftaran->angkatan }}">
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                    value="{{ $pendaftaran->tanggal_lahir }}">
            </div>
            <div class="col-md-6 ">
                <div class="input-group">
                    <label for="phone_number" class="input-group mb-2">Nomor Telepon (WA)</label>
                    <div class="input-group-text">+62</div>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        value="{{ $pendaftaran->phone_number }}">
                </div>
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $pendaftaran->address }}">
            </div>
            <div class="my-4">
            </div>
            <div class="col-md-3">
                <label for="algo" class="form-label">Algoritma</label>
                <input type="text" class="form-control {{
                ($pendaftaran->algo != 'A' && 
                $pendaftaran->algo != 'AB' &&
                $pendaftaran->algo != 'B' &&
                $pendaftaran->algo != 'BC' &&
                $pendaftaran->algo != 'C') ? 'is-invalid' : ''; }}" name="algo" id="algo"
                    value="{{ $pendaftaran->algo }}">
            </div>
            <div class="col-md-3">
                <label for="strukdat" class="form-label">Struktur Data</label>
                <input type="text" class="form-control {{
                ($pendaftaran->strukdat != 'A' && 
                $pendaftaran->strukdat != 'AB' &&
                $pendaftaran->strukdat != 'B' &&
                $pendaftaran->strukdat != 'BC' &&
                $pendaftaran->strukdat != 'C') ? 'is-invalid' : ''; }}" name="strukdat" id="strukdat"
                    value="{{ $pendaftaran->strukdat }}">
            </div>
            <div class="col-md-3">
                <label for="basdat" class="form-label">Basis Data</label>
                <input type="text" class="form-control {{
                ($pendaftaran->basdat != 'A' && 
                $pendaftaran->basdat != 'AB' &&
                $pendaftaran->basdat != 'B' &&
                $pendaftaran->basdat != 'BC' &&
                $pendaftaran->basdat != 'C') ? 'is-invalid' : ''; }}" name="basdat" id="basdat"
                    value="{{ $pendaftaran->basdat }}">
            </div>
            <div class="col-md-3">
                <label for="rpl" class="form-label">Rekayasa Perangkat Lunak</label>
                <input type="text" class="form-control {{
                ($pendaftaran->rpl != 'A' && 
                $pendaftaran->rpl != 'AB' &&
                $pendaftaran->rpl != 'B' &&
                $pendaftaran->rpl != 'BC' &&
                $pendaftaran->rpl != 'C') ? 'is-invalid' : ''; }}" name="rpl" id="rpl" value="{{ $pendaftaran->rpl }}">
            </div>
            <div class="col-md-3">
                <label for="metpen" class="form-label">Metode Penelitian</label>
                <input type="text" class="form-control {{
                ($pendaftaran->metpen != 'A' && 
                $pendaftaran->metpen != 'AB' &&
                $pendaftaran->metpen != 'B' &&
                $pendaftaran->metpen != 'BC' &&
                $pendaftaran->metpen != 'C') ? 'is-invalid' : ''; }}" name="metpen" id="metpen"
                    value="{{ $pendaftaran->metpen }}">
            </div>
            <div class="my-4">
            </div>
            <div class="col-md-3">
                <label for="pemweb" class="form-label">Pemrograman Web</label>
                <input type="text"
                    class="form-control {{($pendaftaran->pemweb == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                    name="pemweb" id="pemweb" value="{{ $pendaftaran->pemweb }}">
            </div>
            <div class="col-md-3">
                <label for="prak_pemweb" class="form-label">Prak. Pemrograman Web</label>
                <input type="text"
                    class="form-control {{($pendaftaran->prak_pemweb == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                    name="prak_pemweb" id="prak_pemweb" value="{{ $pendaftaran->prak_pemweb }}">
            </div>
            <div class="col-md-3">
                <label for="po1" class="form-label">Pemrograman Objek 1</label>
                <input type="text"
                    class="form-control {{($pendaftaran->po1 == 'Belum diambil' ) ? 'is-invalid' : ''; }}" name="po1"
                    id="po1" value="{{ $pendaftaran->po1 }}">
            </div>
            <div class="col-md-3">
                <label for="prak_po1" class="form-label">Prak. Pemrograman Objek 1</label>
                <input type="text"
                    class="form-control {{($pendaftaran->prak_po1 == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                    name="prak_po1" id="prak_po1" value="{{ $pendaftaran->prak_po1 }}">
            </div>
            <div class="col-md-3">
                <label for="appl" class="form-label">Analisis & Perancangan PL</label>
                <input type="text"
                    class="form-control {{($pendaftaran->appl == 'Belum diambil' ) ? 'is-invalid' : ''; }}" name="appl"
                    id="appl" value="{{ $pendaftaran->appl }}">
            </div>
            <div class="my-4">
            </div>
            <div class="col-md-3">
                <label for="jumlah_teori_d" class="form-label">Jumlah Nilai D (Teori)</label>
                <input type="text" class="form-control {{($pendaftaran->jumlah_teori_d > 6 ) ? 'is-invalid' : ''; }}"
                    name="jumlah_teori_d" id="jumlah_teori_d" value="{{ $pendaftaran->jumlah_teori_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_prak_d" class="form-label">Jumlah Nilai D (Prak)</label>
                <input type="text" class="form-control {{($pendaftaran->jumlah_prak_d != 0 ) ? 'is-invalid' : ''; }}"
                    name="jumlah_prak_d" id="jumlah_prak_d" value="{{ $pendaftaran->jumlah_prak_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_e" class="form-label">Jumlah Nilai E</label>
                <input type="text" class="form-control {{($pendaftaran->jumlah_e != 0 ) ? 'is-invalid' : ''; }}"
                    name="jumlah_e" id="jumlah_e" value="{{ $pendaftaran->jumlah_e }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                <input type="text" class="form-control {{($pendaftaran->jumlah_sks < 130 ) ? 'is-invalid' : ''; }}"
                    name="jumlah_sks" id="jumlah_sks" value="{{ $pendaftaran->jumlah_sks }}">
            </div>
            <div class="col-md-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="text" class="form-control {{($pendaftaran->ipk < 2.8 ) ? 'is-invalid' : ''; }}" name="ipk"
                    id="ipk" value="{{ $pendaftaran->ipk }}">
            </div>
            <div class="my-4">
            </div>
            <div class="col-md-12">
                <label for="judul_ta1" class="form-label">Judul Proposal</label>
                <input type="text" class="form-control" name="judul_ta1" id="judul_ta1"
                    value="{{ $pendaftaran->judul_ta1 }}">
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="berkas_ta1" class="form-label">Berkas Proposal</label>
                    <input class="form-control" type="file" id="berkas_ta1" name="berkas_ta1"
                        value="{{ $pendaftaran->berkas_ta1 }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="tagihan_uang" class="form-label">Tagihan Uang Kuliah</label>
                    <input class="form-control" type="file" id="tagihan_uang" name="tagihan_uang"
                        value="{{ $pendaftaran->tagihan_uang }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="lunas_pembayaran" class="form-label">Bukti Lunas Pembayaran</label>
                    <input class="form-control" type="file" id="lunas_pembayaran" name="lunas_pembayaran"
                        value="{{ $pendaftaran->lunas_pembayaran }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="khs" class="form-label">KHS</label>
                    <input class="form-control" type="file" id="khs" name="khs" value="{{ $pendaftaran->khs }}">
                </div>
            </div>

            <div class="my-4">

            </div>

            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Alternatif 1</h6>
                <label for="alt1_p1" class="form-label">Pembimbing 1</label>
                <input type="text" class="form-control" name="alt1_p1" id="alt1_p1" value="{{ $pendaftaran->alt1_p1 }}">
                <label for="alt1_p2" class="form-label mt-2">Pembimbing 2</label>
                <input type="text" class="form-control" name="alt1_p2" id="alt1_p2" value="{{ $pendaftaran->alt1_p2 }}">
            </div>
            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Alternatif 2</h6>
                <label for="alt2_p1" class="form-label">Pembimbing 1</label>
                <input type="text" class="form-control" name="alt2_p1" id="alt2_p1" value="{{ $pendaftaran->alt2_p1 }}">
                <label for="alt2_p2" class="form-label mt-2">Pembimbing 2</label>
                <input type="text" class="form-control" name="alt2_p2" id="alt2_p2" value="{{ $pendaftaran->alt2_p2 }}">
            </div>
            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Alternatif 3</h6>
                <label for="alt3_p1" class="form-label">Pembimbing 1</label>
                <input type="text" class="form-control" name="alt3_p1" id="alt3_p1" value="{{ $pendaftaran->alt3_p1 }}">
                <label for="alt3_p2" class="form-label mt-2">Pembimbing 2</label>
                <input type="text" class="form-control" name="alt3_p2" id="alt3_p2" value="{{ $pendaftaran->alt3_p2 }}">
            </div>
            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Alternatif 4</h6>
                <label for="alt4_p1" class="form-label">Pembimbing 1</label>
                <input type="text" class="form-control" name="alt4_p1" id="alt4_p1" value="{{ $pendaftaran->alt4_p1 }}">
                <label for="alt4_p2" class="form-label mt-2">Pembimbing 2</label>
                <input type="text" class="form-control" name="alt4_p2" id="alt4_p2" value="{{ $pendaftaran->alt4_p2 }}">
            </div>
            <div class="mt-4">
            </div>
        </div>
        <div class="col-12 mt-5">
            <a class="btn" href="/koordinator/list-pendaftaran-ta-1" role="button"
                style="width: 5rem;background-color:#ff8c1a;">Back</a>
            <input type="hidden" id="status" name="status" value="{{ $pendaftaran->status }}">
            <button type="submit" class="btn" style="width: 5rem;background-color:#ff8c1a;">Update</button>
        </div>
        <div style=" height: 100px;">
        </div>
    </div>
</form>


</div>

@endsection