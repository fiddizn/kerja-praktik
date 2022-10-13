@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Seleksi Adiministrasi</h2>

<div class="row align-items-start mt-3">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly
                value="{{ $pendaftaran->mahasiswa->nim }}">
        </div>
        <div class="col-md-6">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" name="gender" id="gender" readonly
                value="{{ $pendaftaran->gender }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $pendaftaran->mahasiswa->name }}">
        </div>
        <div class="col-md-6">
            <label for="peminatan" class="form-label">Peminatan</label>
            <input type="text" class="form-control" name="peminatan" id="peminatan" readonly
                value="{{ $pendaftaran->peminatan }}">
        </div>
        <div class="col-md-6">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" readonly
                value="{{ $pendaftaran->tempat_lahir }}">
        </div>
        <div class="col-md-6">
            <label for="angkatan" class="form-label">Angkatan</label>
            <input type="number" class="form-control" name="angkatan" id="angkatan" readonly
                value="{{ $pendaftaran->angkatan }}">
        </div>
        <div class="col-md-6">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" readonly
                value="{{ $pendaftaran->tanggal_lahir }}">
        </div>
        <div class="col-md-6 ">
            <div class="input-group">
                <label for="phone_number" class="input-group mb-2">Nomor Telepon (WA)</label>
                <div class="input-group-text">+62</div>
                <input type="text" class="form-control" id="phone_number" name="phone_number" readonly
                    value="{{ $pendaftaran->phone_number }}">
            </div>
        </div>
        <div class="col-md-12">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="address" id="address" readonly
                value="{{ $pendaftaran->address }}">
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
                $pendaftaran->algo != 'C') ? 'is-invalid' : ''; }}" name="algo" id="algo" readonly
                value="{{ $pendaftaran->algo }}">
        </div>
        <div class="col-md-3">
            <label for="stukdat" class="form-label">Struktur Data</label>
            <input type="text" class="form-control {{
                ($pendaftaran->strukdat != 'A' && 
                $pendaftaran->strukdat != 'AB' &&
                $pendaftaran->strukdat != 'B' &&
                $pendaftaran->strukdat != 'BC' &&
                $pendaftaran->strukdat != 'C') ? 'is-invalid' : ''; }}" name="stukdat" id="stukdat" readonly
                value="{{ $pendaftaran->strukdat }}">
        </div>
        <div class="col-md-3">
            <label for="basdat" class="form-label">Basis Data</label>
            <input type="text" class="form-control {{
                ($pendaftaran->basdat != 'A' && 
                $pendaftaran->basdat != 'AB' &&
                $pendaftaran->basdat != 'B' &&
                $pendaftaran->basdat != 'BC' &&
                $pendaftaran->basdat != 'C') ? 'is-invalid' : ''; }}" name="basdat" id="basdat" readonly
                value="{{ $pendaftaran->basdat }}">
        </div>
        <div class="col-md-3">
            <label for="rpl" class="form-label">Rekayasa Perangkat Lunak</label>
            <input type="text" class="form-control {{
                ($pendaftaran->rpl != 'A' && 
                $pendaftaran->rpl != 'AB' &&
                $pendaftaran->rpl != 'B' &&
                $pendaftaran->rpl != 'BC' &&
                $pendaftaran->rpl != 'C') ? 'is-invalid' : ''; }}" name="rpl" id="rpl" readonly
                value="{{ $pendaftaran->rpl }}">
        </div>
        <div class="col-md-3">
            <label for="metpen" class="form-label">Metode Penelitian</label>
            <input type="text" class="form-control {{
                ($pendaftaran->metpen != 'A' && 
                $pendaftaran->metpen != 'AB' &&
                $pendaftaran->metpen != 'B' &&
                $pendaftaran->metpen != 'BC' &&
                $pendaftaran->metpen != 'C') ? 'is-invalid' : ''; }}" name="metpen" id="metpen" readonly
                value="{{ $pendaftaran->metpen }}">
        </div>
        <div class="my-4">
        </div>
        <div class="col-md-3">
            <label for="pemweb" class="form-label">Pemrograman Web</label>
            <input type="text" class="form-control {{($pendaftaran->pemweb == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                name="pemweb" id="pemweb" readonly value="{{ $pendaftaran->pemweb }}">
        </div>
        <div class="col-md-3">
            <label for="prak_pemweb" class="form-label">Prak. Pemrograman Web</label>
            <input type="text"
                class="form-control {{($pendaftaran->prak_pemweb == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                name="prak_pemweb" id="prak_pemweb" readonly value="{{ $pendaftaran->prak_pemweb }}">
        </div>
        <div class="col-md-3">
            <label for="po1" class="form-label">Pemrograman Objek 1</label>
            <input type="text" class="form-control {{($pendaftaran->po1 == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                name="po1" id="po1" readonly value="{{ $pendaftaran->po1 }}">
        </div>
        <div class="col-md-3">
            <label for="prak_po1" class="form-label">Prak. Pemrograman Objek 1</label>
            <input type="text"
                class="form-control {{($pendaftaran->prak_po1 == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                name="prak_po1" id="prak_po1" readonly value="{{ $pendaftaran->prak_po1 }}">
        </div>
        <div class="col-md-3">
            <label for="appl" class="form-label">Analisis & Perancangan PL</label>
            <input type="text" class="form-control {{($pendaftaran->appl == 'Belum diambil' ) ? 'is-invalid' : ''; }}"
                name="appl" id="appl" readonly value="{{ $pendaftaran->appl }}">
        </div>
        <div class="my-4">
        </div>
        <div class="col-md-3">
            <label for="jumlah_teori_d" class="form-label">Jumlah Nilai D (Teori)</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_teori_d > 6 ) ? 'is-invalid' : ''; }}"
                name="jumlah_teori_d" id="jumlah_teori_d" readonly value="{{ $pendaftaran->jumlah_teori_d }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_prak_d" class="form-label">Jumlah Nilai D (Prak)</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_prak_d != 0 ) ? 'is-invalid' : ''; }}"
                name="jumlah_prak_d" id="jumlah_prak_d" readonly value="{{ $pendaftaran->jumlah_prak_d }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_e" class="form-label">Jumlah Nilai E</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_e != 0 ) ? 'is-invalid' : ''; }}"
                name="jumlah_e" id="jumlah_e" readonly value="{{ $pendaftaran->jumlah_e }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_sks < 130 ) ? 'is-invalid' : ''; }}"
                name="jumlah_sks" id="jumlah_sks" readonly value="{{ $pendaftaran->jumlah_sks }}">
        </div>
        <div class="col-md-3">
            <label for="ipk" class="form-label">IPK</label>
            <input type="text" class="form-control {{($pendaftaran->ipk < 2.8 ) ? 'is-invalid' : ''; }}" name="ipk"
                id="ipk" readonly value="{{ $pendaftaran->ipk }}">
        </div>
        <div class="my-4">
        </div>
        @if ($pendaftaran->judul_ta1 != null)
        <div class="col-md-12">
            <label for="judul_ta1" class="form-label">Judul Proposal</label>
            <input type="text" class="form-control" name="judul_ta1" id="judul_ta1" readonly
                value="{{ $pendaftaran->judul_ta1 }}">
        </div>
        @endif
        @if ($pendaftaran->berkas_ta1 != null)
        <div class="row mt-4">
            <div class="col-md-5">
                <label for="berkas_ta1" class="form-label col-sm-5">Berkas Proposal</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}/downloadBerkasTa1">Download <svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-download" viewBox="0 0 16 16">
                        <path
                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path
                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                    </svg>
                </a>
            </div>
        </div>
        @endif
        <div class="row mt-4">
            <div class="col-md-5">
                <label for="tagihan_uang" class="form-label col-sm-5">Tagihan Uang Kuliah</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}/downloadTagihanUang">Download <svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-download" viewBox="0 0 16 16">
                        <path
                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path
                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <label for="lunas_pembayaran" class="form-label col-sm-5">Bukti Lunas Pembayaran</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}/downloadLunasPembayaran">Download
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-download" viewBox="0 0 16 16">
                        <path
                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path
                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <label for="khs" class="form-label col-sm-5">KHS</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}/downloadKhs">Download <svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-download" viewBox="0 0 16 16">
                        <path
                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path
                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="my-4">

        </div>

        <div class="col-md-6 p-2">
            <h6 style="text-align:center;">Alternatif 1</h6>
            <label for="alt1_p1" class="form-label">Pembimbing 1</label>
            <input type="text" class="form-control" name="alt1_p1" id="alt1_p1" readonly
                value="{{ $pendaftaran->alt1_p1 }}">
            <label for="alt1_p2" class="form-label mt-2">Pembimbing 2</label>
            <input type="text" class="form-control" name="alt1_p2" id="alt1_p2" readonly
                value="{{ $pendaftaran->alt1_p2 }}">
        </div>
        <div class="col-md-6 p-2">
            <h6 style="text-align:center;">Alternatif 2</h6>
            <label for="alt2_p1" class="form-label">Pembimbing 1</label>
            <input type="text" class="form-control" name="alt2_p1" id="alt2_p1" readonly
                value="{{ $pendaftaran->alt2_p1 }}">
            <label for="alt2_p2" class="form-label mt-2">Pembimbing 2</label>
            <input type="text" class="form-control" name="alt2_p2" id="alt2_p2" readonly
                value="{{ $pendaftaran->alt2_p2 }}">
        </div>
        <div class="col-md-6 p-2">
            <h6 style="text-align:center;">Alternatif 3</h6>
            <label for="alt3_p1" class="form-label">Pembimbing 1</label>
            <input type="text" class="form-control" name="alt3_p1" id="alt3_p1" readonly
                value="{{ $pendaftaran->alt3_p1 }}">
            <label for="alt3_p2" class="form-label mt-2">Pembimbing 2</label>
            <input type="text" class="form-control" name="alt3_p2" id="alt3_p2" readonly
                value="{{ $pendaftaran->alt3_p2 }}">
        </div>
        <div class="col-md-6 p-2">
            <h6 style="text-align:center;">Alternatif 4</h6>
            <label for="alt4_p1" class="form-label">Pembimbing 1</label>
            <input type="text" class="form-control" name="alt4_p1" id="alt4_p1" readonly
                value="{{ $pendaftaran->alt4_p1 }}">
            <label for="alt4_p2" class="form-label mt-2">Pembimbing 2</label>
            <input type="text" class="form-control" name="alt4_p2" id="alt4_p2" readonly
                value="{{ $pendaftaran->alt4_p2 }}">
        </div>
        <div class="mt-4">
        </div>

        <h5 style="text-align:center;">Siswa di atas dinyatakan:</h5>
        <div class="d-flex justify-content-center mt-3 ">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf

                        @if ($status != "Lolos")
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                        @endif

                    </form>
                </div>

                @if ($status != "Lolos Bersyarat")
                <a class="btn btn-warning"
                    href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}/lolos-bersyarat" role="button"
                    style="width: 10rem; height: 3rem;">Lolos Bersyarat</a>
                @endif

                <form method="post" action="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf

                    @if ($status != "Pending")
                    <input type="hidden" id="status" name="status" value="Pending">
                    <button type="submit" class="btn btn-danger mx-2"
                        style="width: 10rem; height: 3rem;">Pending</button>
                    @endif

                </form>

                @if ($status != "Tidak Lolos")
                <a class="btn btn-dark" href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}/tidak-lolos"
                    role="button" style="width: 10rem; height: 3rem;">Tidak Lolos</a>
                @endif

            </div>
        </div>
    </div>
    <div class="col-12 mt-5">
        <a class="btn" href="/koordinator/list-pendaftaran-ta-1" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
    </div>
    <div style=" height: 100px;">
    </div>
</div>
@endsection