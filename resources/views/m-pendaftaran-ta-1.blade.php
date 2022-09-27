@extends('layouts/main')
@section('container')

<h2 style="text-align:center;">Pendaftaran{{$seminar}}Tugas Akhir 1</h2>

<div class="row align-items-start mt-3">
    <?php
    if ($seminar == '') {
        echo '<form class="row g-3" action="/mahasiswa/pendaftaran-ta-1" method="POST">';
    } else {
        echo '<form class="row g-3" action="/mahasiswa/pendaftaran-seminar-ta-1" method="POST">';
    }
    ?>

    @csrf
    <div class="col-md-6">
        <label for="nim" class="form-label">NIM</label>
        <input type="number" class="form-control" name="nim" id="nim">
    </div>
    <div class="col-md-6">
        <label for="gender" class="form-label">Jenis Kelamin</label>
        <select type="text" class="form-select" name="gender" id="gender">
            <option disabled selected>Pilih...</option>
            <option>Laki-laki</option>
            <option>Perempuan</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="col-md-6">
        <label for="peminatan" class="form-label">Peminatan</label>
        <select type="text" class="form-select" name="peminatan" id="peminatan">
            <option disabled selected>Pilih...</option>
            <option>AIG</option>
            <option>DSE</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
    </div>
    <div class="col-md-6">
        <label for="angkatan" class="form-label">Angkatan</label>
        <input type="number" class="form-control" name="angkatan" id="angkatan">
    </div>
    <div class="col-md-6">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
    </div>
    <div class="col-md-6 ">
        <div class="input-group">
            <label for="phone_number" class="input-group mb-2">Nomor Telepon (WA)</label>
            <div class="input-group-text">+62</div>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>
    </div>
    <div class="col-md-12">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control" name="address" id="address">
    </div>



    <div class="my-4">

    </div>



    <div class="col-md-3">
        <label for="algo" class="form-label">Algoritma</label>
        <select type="text" class="form-select" name="algo" id="algo">
            <option disabled selected> </option>
            <option>A</option>
            <option>AB</option>
            <option>B</option>
            <option>BC</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="strukdat" class="form-label">Struktur Data</label>
        <select type="text" class="form-select" name="strukdat" id="strukdat">
            <option disabled selected> </option>
            <option>A</option>
            <option>AB</option>
            <option>B</option>
            <option>BC</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="basdat" class="form-label">Basis Data</label>
        <select type="text" class="form-select" name="basdat" id="basdat">
            <option disabled selected> </option>
            <option>A</option>
            <option>AB</option>
            <option>B</option>
            <option>BC</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="rpl" class="form-label">Rekayasa Perangkat Lunak</label>
        <select type="text" class="form-select" name="rpl" id="rpl">
            <option disabled selected> </option>
            <option>A</option>
            <option>AB</option>
            <option>B</option>
            <option>BC</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="metpen" class="form-label">Metode Penelitian</label>
        <select type="text" class="form-select" name="metpen" id="metpen">
            <option disabled selected> </option>
            <option>A</option>
            <option>AB</option>
            <option>B</option>
            <option>BC</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="mt-4">

    </div>
    <div class="col-md-3">
        <label for="pemweb" class="form-label">Pemrograman Web</label>
        <select type="text" class="form-select" name="pemweb" id="pemweb">
            <option disabled selected> </option>
            <option>Sudah Selesai</option>
            <option>Sedang Diambil</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="prak_pemweb" class="form-label">Prak. Pemrograman Web</label>
        <select type="text" class="form-select" name="prak_pemweb" id="prak_pemweb">
            <option disabled selected> </option>
            <option>Sudah Selesai</option>
            <option>Sedang Diambil</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="po1" class="form-label">Pemrograman Objek 1</label>
        <select type="text" class="form-select" name="po1" id="po1">
            <option disabled selected> </option>
            <option>Sudah Selesai</option>
            <option>Sedang Diambil</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="prak_po1" class="form-label">Prak. Pemrograman Objek 1</label>
        <select type="text" class="form-select" name="prak_po1" id="prak_po1">
            <option disabled selected> </option>
            <option>Sudah Selesai</option>
            <option>Sedang Diambil</option>
            <option>Belum Diambil</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="appl" class="form-label">Analisis & Perancangan PL</label>
        <select type="text" class="form-select" name="appl" id="appl">
            <option disabled selected> </option>
            <option>Sudah Selesai</option>
            <option>Sedang Diambil</option>
            <option>Belum Diambil</option>
        </select>
    </div>


    <div class="my-4">

    </div>



    <div class="col-md-3">
        <label for="jumlah_teori_d" class="form-label">Jumlah Nilai D (Teori)</label>
        <input type="number" class="form-control" name="jumlah_teori_d" id="jumlah_teori_d">
    </div>
    <div class="col-md-3">
        <label for="jumlah_prak_d" class="form-label">Jumlah Nilai D (Prak)</label>
        <input type="number" class="form-control" name="jumlah_prak_d" id="jumlah_prak_d">
    </div>
    <div class="col-md-3">
        <label for="jumlah_e" class="form-label">Jumlah Nilai E</label>
        <input type="number" class="form-control" name="jumlah_e" id="jumlah_e">
    </div>
    <div class="col-md-3">
        <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
        <input type="number" class="form-control" name="jumlah_sks" id="jumlah_sks">
    </div>
    <div class="col-md-3">
        <label for="ipk" class="form-label">IPK</label>
        <input type="number" step="0.01" class="form-control" name="ipk" id="ipk">
    </div>

    <div class="my-4">

    </div>

    <div class="col-md-12">
        <label for="judul_ta1" class="form-label">Judul Proposal</label>
        <input type="text" class="form-control" name="judul_ta1" id="judul_ta1">
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

    <div class="my-4">

    </div>
    @if ($seminar == '')
    <div class="col-md-6 p-2">
        <h6 style="text-align:center;">Alternatif 1</h6>
        <label for="alt1_p1" class="form-label">Pembimbing 1</label>
        <select type="text" class="form-select" name="alt1_p1" id="alt1_p1">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
        <label for="alt1_p2" class="form-label mt-2">Pembimbing 2</label>
        <select type="text" class="form-select" name="alt1_p2" id="alt1_p2">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
    </div>
    <div class="col-md-6 p-2">
        <h6 style="text-align:center;">Alternatif 2</h6>
        <label for="alt2_p1" class="form-label">Pembimbing 1</label>
        <select type="text" class="form-select" name="alt2_p1" id="alt2_p1">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
        <label for="alt2_p2" class="form-label mt-2">Pembimbing 2</label>
        <select type="text" class="form-select" name="alt2_p2" id="alt2_p2">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
    </div>
    <div class="col-md-6 p-2">
        <h6 style="text-align:center;">Alternatif 3</h6>
        <label for="alt3_p1" class="form-label">Pembimbing 1</label>
        <select type="text" class="form-select" name="alt3_p1" id="alt3_p1">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
        <label for="alt3_p2" class="form-label mt-2">Pembimbing 2</label>
        <select type="text" class="form-select" name="alt3_p2" id="alt3_p2">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
    </div>
    <div class="col-md-6 p-2">
        <h6 style="text-align:center;">Alternatif 4</h6>
        <label for="alt4_p1" class="form-label">Pembimbing 1</label>
        <select type="text" class="form-select" name="alt4_p1" id="alt4_p1">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
        <label for="alt4_p2" class="form-label mt-2">Pembimbing 2</label>
        <select type="text" class="form-select" name="alt4_p2" id="alt4_p2">
            <option disabled selected> </option>
            <option>dosen1</option>
            <option>dosen2</option>
        </select>
    </div>
    @endif
    <div class="mt-4">

    </div>
    <div class="col-12 m-2">
        <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
        <button type=" submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Submit</button>
    </div>
    <div style=" height: 100px;">
    </div>
    </form>

</div>

@endsection