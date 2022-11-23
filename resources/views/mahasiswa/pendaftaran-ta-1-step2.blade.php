@extends('layouts/main')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">Pendaftaran{{$seminar}} Tugas Akhir 1</h2>

<div class="row align-items-start mt-3">
    @if ($seminar == '')
    <form class="row g-3" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-1-step2" method="POST"
        enctype="multipart/form-data">
        @else
        <form class="row g-3" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1-step2" method="POST">
            @endif
            @csrf
            @if($pendaftaran == null)
            <div class="col-md-3">
                <label for="algo" class="form-label">Algoritma</label>
                <select type="text" class="form-select" name="algo" id="algo" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="strukdat" class="form-label">Struktur Data</label>
                <select type="text" class="form-select" name="strukdat" id="strukdat" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="basdat" class="form-label">Basis Data</label>
                <select type="text" class="form-select" name="basdat" id="basdat" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="rpl" class="form-label">Rekayasa Perangkat Lunak</label>
                <select type="text" class="form-select" name="rpl" id="rpl" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="metpen" class="form-label">Metode Penelitian</label>
                <select type="text" class="form-select" name="metpen" id="metpen" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">

            </div>
            <div class="col-md-3">
                <label for="pemweb" class="form-label">Pemrograman Web</label>
                <select type="text" class="form-select" name="pemweb" id="pemweb" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Sudah Selesai</option>
                    <option>Sedang Diambil</option>
                    <option>Belum Diambil</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="prak_pemweb" class="form-label">Prak. Pemrograman Web</label>
                <select type="text" class="form-select" name="prak_pemweb" id="prak_pemweb" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Sudah Selesai</option>
                    <option>Sedang Diambil</option>
                    <option>Belum Diambil</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="po1" class="form-label">Pemrograman Objek 1</label>
                <select type="text" class="form-select" name="po1" id="po1" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Sudah Selesai</option>
                    <option>Sedang Diambil</option>
                    <option>Belum Diambil</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="prak_po1" class="form-label">Prak. Pemrograman Objek 1</label>
                <select type="text" class="form-select" name="prak_po1" id="prak_po1" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Sudah Selesai</option>
                    <option>Sedang Diambil</option>
                    <option>Belum Diambil</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="appl" class="form-label">Analisis & Perancangan PL</label>
                <select type="text" class="form-select" name="appl" id="appl" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Sudah Selesai</option>
                    <option>Sedang Diambil</option>
                    <option>Belum Diambil</option>
                </select>
            </div>
            <div class="my-4">

            </div>
            <div class="col-md-3">
                <label for="jumlah_teori_d" class="form-label">Jumlah SKS yang bernilai D (Teori)</label>
                <input type="number" class="form-control" name="jumlah_teori_d" id="jumlah_teori_d" placeholder="0"
                    required>
            </div>
            <div class="col-md-3">
                <label for="jumlah_prak_d" class="form-label">Jumlah SKS yang bernilai D (Prak)</label>
                <input type="number" class="form-control" name="jumlah_prak_d" id="jumlah_prak_d" placeholder="0"
                    required>
            </div>
            <div class="col-md-3">
                <label for="jumlah_e" class="form-label">Jumlah SKS yang bernilai E</label>
                <input type="number" class="form-control" name="jumlah_e" id="jumlah_e" placeholder="0" required>
            </div>
            <div class="col-md-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS (sudah & sedang diambil)</label>
                <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks" placeholder="138" required>
            </div>
            <div class="col-md-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" step="0.01" class="form-control" name="ipk" id="ipk" placeholder="3.10" required>
            </div>

            @else
            <div class="col-md-3">
                <label for="algo" class="form-label">Algoritma</label>
                <select type="text" class="form-select" name="algo" id="algo" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if($pendaftaran->algo == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @else
                    <option>{{$angka_mutu}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="strukdat" class="form-label">Struktur Data</label>
                <select type="text" class="form-select" name="strukdat" id="strukdat" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if($pendaftaran->strukdat == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @else
                    <option>{{$angka_mutu}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="basdat" class="form-label">Basis Data</label>
                <select type="text" class="form-select" name="basdat" id="basdat" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if($pendaftaran->basdat == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @else
                    <option>{{$angka_mutu}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="rpl" class="form-label">Rekayasa Perangkat Lunak</label>
                <select type="text" class="form-select" name="rpl" id="rpl" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if($pendaftaran->rpl == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @else
                    <option>{{$angka_mutu}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="metpen" class="form-label">Metode Penelitian</label>
                <select type="text" class="form-select" name="metpen" id="metpen" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if($pendaftaran->metpen == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @else
                    <option>{{$angka_mutu}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-4">

            </div>
            <div class="col-md-3">
                <label for="pemweb" class="form-label">Pemrograman Web</label>
                <select type="text" class="form-select" name="pemweb" id="pemweb" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if($pendaftaran->pemweb == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @endif
                    <option>{{$status_matkul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="prak_pemweb" class="form-label">Prak. Pemrograman Web</label>
                <select type="text" class="form-select" name="prak_pemweb" id="prak_pemweb" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if($pendaftaran->prak_pemweb == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @endif
                    <option>{{$status_matkul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="po1" class="form-label">Pemrograman Objek 1</label>
                <select type="text" class="form-select" name="po1" id="po1" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if($pendaftaran->po1 == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @endif
                    <option>{{$status_matkul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="prak_po1" class="form-label">Prak. Pemrograman Objek 1</label>
                <select type="text" class="form-select" name="prak_po1" id="prak_po1" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if($pendaftaran->prak_po1 == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @endif
                    <option>{{$status_matkul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="appl" class="form-label">Analisis & Perancangan PL</label>
                <select type="text" class="form-select" name="appl" id="appl" required>
                    <option value="" disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if($pendaftaran->appl == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @endif
                    <option>{{$status_matkul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-4">

            </div>
            <div class="col-md-3">
                <label for="jumlah_teori_d" class="form-label">Jumlah SKS yang bernilai D (Teori)</label>
                <input type="number" min="0" max="140" class="form-control" name="jumlah_teori_d" id="jumlah_teori_d"
                    value="{{ $pendaftaran->jumlah_teori_d }}" required>
            </div>
            <div class="col-md-3">
                <label for="jumlah_prak_d" class="form-label">Jumlah SKS yang bernilai D (Prak)</label>
                <input type="number" min="0" max="140" class="form-control" name="jumlah_prak_d" id="jumlah_prak_d"
                    value="{{ $pendaftaran->jumlah_prak_d }}" required>
            </div>
            <div class="col-md-3">
                <label for="jumlah_e" class="form-label">Jumlah SKS yang bernilai E</label>
                <input type="number" min="0" max="140" class="form-control" name="jumlah_e" id="jumlah_e"
                    value="{{ $pendaftaran->jumlah_e }}" required>
            </div>
            <div class="col-md-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                <input type="number" min="0" max="160" class="form-control" name="jumlah_sks" id="jumlah_sks"
                    value="{{ $pendaftaran->jumlah_sks }}" required>
            </div>
            <div class="col-md-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" min="0" max="4" step="0.01" class="form-control" name="ipk" id="ipk"
                    value="{{ $pendaftaran->ipk }}" required>
            </div>

            @endif
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="khs" class="form-label">Kartu Hasil Studi</label>
                    <input class="form-control @error('khs') is-invalid @enderror" type="file" id="khs" name="khs"
                        required>
                    <div id="khs" class="invalid-feedback">File harus berupa WORD/PDF!</div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <a class="btn" href="/mahasiswa/pendaftaran-ta-1-step1" role="button"
                    style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Next</button>
            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
    <script type="text/javascript" src="/js/validasiPembimbing.js"></script>
    <script type="text/javascript" src="/js/validasijabfun.js"></script>
</div>
@endsection