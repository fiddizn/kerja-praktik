@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Seleksi Seminar</h2>

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
            <input type="text" class="form-control {{($pendaftaran->pemweb == 'Belum Diambil' ) ? 'is-invalid' : ''; }}"
                name="pemweb" id="pemweb" readonly value="{{ $pendaftaran->pemweb }}">
        </div>
        <div class="col-md-3">
            <label for="prak_pemweb" class="form-label">Prak. Pemrograman Web</label>
            <input type="text"
                class="form-control {{($pendaftaran->prak_pemweb == 'Belum Diambil' ) ? 'is-invalid' : ''; }}"
                name="prak_pemweb" id="prak_pemweb" readonly value="{{ $pendaftaran->prak_pemweb }}">
        </div>
        <div class="col-md-3">
            <label for="po1" class="form-label">Pemrograman Objek 1</label>
            <input type="text" class="form-control {{($pendaftaran->po1 == 'Belum Diambil' ) ? 'is-invalid' : ''; }}"
                name="po1" id="po1" readonly value="{{ $pendaftaran->po1 }}">
        </div>
        <div class="col-md-3">
            <label for="prak_po1" class="form-label">Prak. Pemrograman Objek 1</label>
            <input type="text"
                class="form-control {{($pendaftaran->prak_po1 == 'Belum Diambil' ) ? 'is-invalid' : ''; }}"
                name="prak_po1" id="prak_po1" readonly value="{{ $pendaftaran->prak_po1 }}">
        </div>
        <div class="col-md-3">
            <label for="appl" class="form-label">Analisis & Perancangan PL</label>
            <input type="text" class="form-control {{($pendaftaran->appl == 'Belum Diambil' ) ? 'is-invalid' : ''; }}"
                name="appl" id="appl" readonly value="{{ $pendaftaran->appl }}">
        </div>
        <div class="my-4">
        </div>
        <div class="col-md-3">
            <label for="jumlah_teori_d" class="form-label">Jumlah SKS yang bernilai D (Teori)</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_teori_d > 6 ) ? 'is-invalid' : ''; }}"
                name="jumlah_teori_d" id="jumlah_teori_d" readonly value="{{ $pendaftaran->jumlah_teori_d }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_prak_d" class="form-label">Jumlah SKS yang bernilai D (Prak)</label>
            <input type="text" class="form-control {{($pendaftaran->jumlah_prak_d != 0 ) ? 'is-invalid' : ''; }}"
                name="jumlah_prak_d" id="jumlah_prak_d" readonly value="{{ $pendaftaran->jumlah_prak_d }}">
        </div>
        <div class="col-md-3">
            <label for="jumlah_e" class="form-label">Jumlah SKS yang bernilai E</label>
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
            <div class="col-md-6">
                <label for="berkas_ta1" class="form-label col-sm-5">Berkas Proposal</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/downloadBerkasTa1">Download
                    <i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        @endif
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="tagihan_uang" class="form-label col-sm-5">Tagihan Uang Kuliah</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/downloadTagihanUang">Download
                    <i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="lunas_pembayaran" class="form-label col-sm-5">Bukti Lunas Pembayaran</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/downloadLunasPembayaran">Download
                    <i class="fa-solid fa-download"></i></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="khs" class="form-label col-sm-5">KHS</label>
                <a class="btn" style="width: 12rem; background-color:#ff8c1a;"
                    href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/downloadKhs">Download <i
                        class="fa-solid fa-download"></i></a>
            </div>
        </div>

        <div class="my-4">

        </div>

        <div class="mt-4">
        </div>

        <h5 style="text-align:center;">Siswa di atas dinyatakan:</h5>
        <div class="d-flex justify-content-center mt-3 ">
            @if ($status == null)
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2 "
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>
                <a class="btn btn-warning" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/lolos-bersyarat"
                    role="button" style="width: 10rem; height: 3rem;">Lolos Bersyarat</a>
                <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">
                    <button type="submit" class="btn btn-danger mx-2"
                        style="width: 10rem; height: 3rem;">Pending</button>
                </form>
                <a class="btn btn-dark" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Lolos")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2  disabled"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>
                <a class="btn btn-warning" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/lolos-bersyarat"
                    role="button" style="width: 10rem; height: 3rem;">Lolos Bersyarat</a>
                <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">
                    <button type="submit" class="btn btn-danger mx-2"
                        style="width: 10rem; height: 3rem;">Pending</button>
                </form>
                <a class="btn btn-dark" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Lolos Bersyarat")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>
                <a class="btn btn-warning disabled"
                    href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/lolos-bersyarat" role="button"
                    style="width: 10rem; height: 3rem;">Lolos Bersyarat</a>
                <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">
                    <button type="submit" class="btn btn-danger mx-2"
                        style="width: 10rem; height: 3rem;">Pending</button>
                </form>
                <a class="btn btn-dark" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Pending")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>
                <a class="btn btn-warning" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/lolos-bersyarat"
                    role="button" style="width: 10rem; height: 3rem;">Lolos Bersyarat</a>
                <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">
                    <button type="submit" class="btn btn-danger mx-2 disabled"
                        style="width: 10rem; height: 3rem;">Pending</button>
                </form>
                <a class="btn btn-dark" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/tidak-lolos" role="button"
                    style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @elseif ($status == "Tidak Lolos")
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status" value="Lolos">
                        <button type="submit" class="btn btn-success mx-2"
                            style="width: 10rem; height: 3rem;">Lolos</button>
                    </form>
                </div>
                <a class="btn btn-warning" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/lolos-bersyarat"
                    role="button" style="width: 10rem; height: 3rem;">Lolos Bersyarat</a>
                <form method="post" action="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" id="status" name="status" value="Pending">
                    <button type="submit" class="btn btn-danger mx-2"
                        style="width: 10rem; height: 3rem;">Pending</button>
                </form>
                <a class="btn btn-dark disabled" href="/tu/pendaftaran-seminar/{{ $pendaftaran->id }}/tidak-lolos"
                    role="button" style="width: 10rem; height: 3rem;">Tidak Lolos</a>
            </div>
            @endif
        </div>
    </div>
    <div class="col-12 mt-5">
        <a class="btn" href="/tu/pendaftaran-seminar" role="button"
            style="width: 5rem;background-color:#ff8c1a;">Back</a>
    </div>
    <div style=" height: 100px;">
    </div>
</div>
@endsection