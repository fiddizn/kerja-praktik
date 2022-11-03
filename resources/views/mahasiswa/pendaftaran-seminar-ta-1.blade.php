@extends('layouts/main')
@section('container')
@if (session()->has('ajuanPembimbingNotValid'))
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('ajuanPembimbingNotValid') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 style="text-align:center;">Pendaftaran{{$seminar}}Tugas Akhir 1</h2>

<div class="row align-items-start mt-3">
    @if ($seminar == '')
    <form class="row g-3" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-1" method="POST"
        enctype="multipart/form-data">
        @else
        <form class="row g-3" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1" method="POST"
            enctype="multipart/form-data">
            @endif
            @csrf
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim"
                    value="{{ auth()->user()->mahasiswa->nim }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select type="text" class="form-select" name="gender" id="gender">
                    @if (auth()->user()->pendaftaran->gender == "Laki-laki")
                    <option disabled>Pilih...</option>
                    <option selected>Laki-laki</option>
                    <option>Perempuan</option>
                    @elseif (auth()->user()->pendaftaran->gender == "Perempuan")
                    <option disabled>Pilih...</option>
                    <option>Laki-laki</option>
                    <option selected>Perempuan</option>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ auth()->user()->mahasiswa->name }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="peminatan" class="form-label">Peminatan</label>
                <select type="text" class="form-select" name="peminatan" id="peminatan">
                    @if (auth()->user()->pendaftaran->peminatan == "AIG")
                    <option disabled>Pilih...</option>
                    <option selected>AIG</option>
                    <option>DSE</option>
                    @elseif (auth()->user()->pendaftaran->peminatan == "DSE")
                    <option disabled>Pilih...</option>
                    <option>AIG</option>
                    <option selected>DSE</option>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                    value="{{ auth()->user()->pendaftaran->tempat_lahir }}">
            </div>
            <div class="col-md-6">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select type="text" class="form-select" name="angkatan" id="angkatan">
                    @if (auth()->user()->pendaftaran->angkatan == "2016")
                    <option disabled>Pilih...</option>
                    <option selected>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    @elseif (auth()->user()->pendaftaran->angkatan == "2017")
                    <option disabled>Pilih...</option>
                    <option>2016</option>
                    <option selected>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    @elseif (auth()->user()->pendaftaran->angkatan == "2018")
                    <option disabled>Pilih...</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option selected>2018</option>
                    <option>2019</option>
                    @elseif (auth()->user()->pendaftaran->angkatan == "2019")
                    <option disabled>Pilih...</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option selected>2019</option>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                    value="{{ auth()->user()->pendaftaran->tanggal_lahir }}">
            </div>
            <div class="col-md-6 ">
                <div class="input-group">
                    <label for="phone_number" class="input-group mb-2">Nomor Telepon (WA)</label>
                    <div class="input-group-text">+62</div>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        placeholder="81234567890" value="{{ auth()->user()->pendaftaran->phone_number }}">
                </div>
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Alamat"
                    value="{{ auth()->user()->pendaftaran->address }}">
            </div>



            <div class="my-4">

            </div>



            <div class="col-md-3">
                <label for="algo" class="form-label">Algoritma</label>
                <select type="text" class="form-select" name="algo" id="algo">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if(auth()->user()->pendaftaran->algo == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @endif
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="strukdat" class="form-label">Struktur Data</label>
                <select type="text" class="form-select" name="strukdat" id="strukdat">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if(auth()->user()->pendaftaran->strukdat == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @endif
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="basdat" class="form-label">Basis Data</label>
                <select type="text" class="form-select" name="basdat" id="basdat">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if(auth()->user()->pendaftaran->basdat == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @endif
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="rpl" class="form-label">Rekayasa Perangkat Lunak</label>
                <select type="text" class="form-select" name="rpl" id="rpl">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if(auth()->user()->pendaftaran->rpl == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @endif
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="metpen" class="form-label">Metode Penelitian</label>
                <select type="text" class="form-select" name="metpen" id="metpen">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($angka_mutus as $angka_mutu)
                    @if(auth()->user()->pendaftaran->metpen == $angka_mutu)
                    <option selected>{{$angka_mutu}}</option>
                    @endif
                    <option>{{$angka_mutu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">

            </div>
            <div class="col-md-3">
                <label for="pemweb" class="form-label">Pemrograman Web</label>
                <select type="text" class="form-select" name="pemweb" id="pemweb">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if(auth()->user()->pendaftaran->pemweb == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @else
                    <option>{{$status_matkul}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="prak_pemweb" class="form-label">Prak. Pemrograman Web</label>
                <select type="text" class="form-select" name="prak_pemweb" id="prak_pemweb">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if(auth()->user()->pendaftaran->prak_pemweb == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @else
                    <option>{{$status_matkul}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="po1" class="form-label">Pemrograman Objek 1</label>
                <select type="text" class="form-select" name="po1" id="po1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if(auth()->user()->pendaftaran->po1 == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @else
                    <option>{{$status_matkul}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="prak_po1" class="form-label">Prak. Pemrograman Objek 1</label>
                <select type="text" class="form-select" name="prak_po1" id="prak_po1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if(auth()->user()->pendaftaran->prak_po1 == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @else
                    <option>{{$status_matkul}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="appl" class="form-label">Analisis & Perancangan PL</label>
                <select type="text" class="form-select" name="appl" id="appl">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($status_matkuls as $status_matkul)
                    @if(auth()->user()->pendaftaran->appl == $status_matkul)
                    <option selected>{{$status_matkul}}</option>
                    @else
                    <option>{{$status_matkul}}</option>
                    @endif
                    @endforeach
                </select>
            </div>


            <div class="my-4">

            </div>



            <div class="col-md-3">
                <label for="jumlah_teori_d" class="form-label">Jumlah SKS yang bernilai D (Teori)</label>
                <input type="number" class="form-control" name="jumlah_teori_d" id="jumlah_teori_d" placeholder="0"
                    value="{{ auth()->user()->pendaftaran->jumlah_teori_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_prak_d" class="form-label">Jumlah SKS yang bernilai D (Prak)</label>
                <input type="number" class="form-control" name="jumlah_prak_d" id="jumlah_prak_d" placeholder="0"
                    value="{{ auth()->user()->pendaftaran->jumlah_prak_d }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_e" class="form-label">Jumlah SKS yang bernilai E</label>
                <input type="number" class="form-control" name="jumlah_e" id="jumlah_e" placeholder="0"
                    value="{{ auth()->user()->pendaftaran->jumlah_e }}">
            </div>
            <div class="col-md-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS (sudah & sedang diambil)</label>
                <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks" placeholder="138"
                    value="{{ auth()->user()->pendaftaran->jumlah_sks }}">
            </div>
            <div class="col-md-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" step="0.01" class="form-control" name="ipk" id="ipk" placeholder="3.10"
                    value="{{ auth()->user()->pendaftaran->ipk }}">
            </div>

            <div class="my-4">

            </div>

            <div class="col-md-12">
                <label for="judul_ta1" class="form-label">Judul Proposal</label>
                <input type="text" class="form-control error" name="judul_ta1" id="judul_ta1"
                    placeholder="Judul Penelitian">
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="berkas_ta1" class="form-label">Berkas Proposal</label>
                    <input class="form-control" type="file" id="berkas_ta1" name="berkas_ta1">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="tagihan_uang" class="form-label">Tagihan Uang Kuliah</label>
                    <input class="form-control" type="file" id="tagihan_uang" name="tagihan_uang">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="lunas_pembayaran" class="form-label">Bukti Lunas Pembayaran</label>
                    <input class="form-control" type="file" id="lunas_pembayaran" name="lunas_pembayaran">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5">
                    <label for="khs" class="form-label">Kartu Hasil Studi</label>
                    <input class="form-control" type="file" id="khs" name="khs">
                </div>
            </div>

            <div class="my-4">

            </div>
            @if ($seminar == '')
            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Pembimbing 1</h6>
                <label for="alt1_p1" class="form-label error">Alternatif 1</label>
                <select type="text" class="form-select" name="alt1_p1" id="alt1_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt2_p1" class="form-label mt-2">Alternatif 2</label>
                <select type="text" class="form-select" name="alt2_p1" id="alt2_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt3_p1" class="form-label mt-2 ">Alternatif 3</label>
                <select type="text" class="form-select" name="alt3_p1" id="alt3_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt4_p1" class="form-label mt-2">Alternatif 4</label>
                <select type="text" class="form-select" name="alt4_p1" id="alt4_p1">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p1 as $p1)
                    <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 p-2">
                <h6 style="text-align:center;">Pembimbing 2</h6>
                <label for="alt1_p2" class="form-label">Alternatif 1</label>
                <select type="text" class="form-select" name="alt1_p2" id="alt1_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt2_p2" class="form-label mt-2">Alternatif 2</label>
                <select type="text" class="form-select" name="alt2_p2" id="alt2_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt3_p2" class="form-label mt-2">Alternatif 3</label>
                <select type="text" class="form-select" name="alt3_p2" id="alt3_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
                <label for="alt4_p2" class="form-label mt-2">Alternatif 4</label>
                <select type="text" class="form-select" name="alt4_p2" id="alt4_p2">
                    <option disabled selected>Pilih.. </option>
                    @foreach ($list_p2 as $p2)
                    <option>{{ $p2->name }} ({{ $p2->jabfung->name }})</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="mt-4">

            </div>
            <div class="col-12 m-2">
                <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
    <script type="text/javascript" src="/js/validasiPembimbing.js"></script>
    <script type="text/javascript" src="/js/validasijabfun.js"></script>
</div>
@endsection