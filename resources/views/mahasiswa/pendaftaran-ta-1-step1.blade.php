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
    <form class="row g-3" id="formAdministrasi" action="/mahasiswa/pendaftaran-ta-1-step1" method="POST"
        enctype="multipart/form-data">
        @else
        <form class="row g-3" id="formSeminar" action="/mahasiswa/pendaftaran-seminar-ta-1-step1" method="POST">
            @endif
            @csrf
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim"
                    value="{{ auth()->user()->mahasiswa->nim }}" disabled>
            </div>
            @if ($pendaftaran != null)
            <div class="col-md-6">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select type="text" class="form-select" name="gender" id="gender">
                    @if ($pendaftaran->gender == 'Laki-laki')
                    <option disabled>Pilih...</option>
                    <option selected>Laki-laki</option>
                    <option>Perempuan</option>
                    @else
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
                    @if ($pendaftaran->peminatan == 'AIG')
                    <option disabled>Pilih...</option>
                    <option selected>AIG</option>
                    <option>DSE</option>
                    @else
                    <option disabled>Pilih...</option>
                    <option>AIG</option>
                    <option selected>DSE</option>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                    value="{{ $pendaftaran->tempat_lahir}}">
            </div>
            <div class="col-md-6">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select type="text" class="form-select" name="angkatan" id="angkatan">
                    @if ($pendaftaran->angkatan == '2017')
                    <option disabled>Pilih...</option>
                    <option selected>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    @elseif ($pendaftaran->angkatan == '2018')
                    <option disabled>Pilih...</option>
                    <option>2017</option>
                    <option selected>2018</option>
                    <option>2019</option>
                    @else
                    <option disabled>Pilih...</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option selected>2019</option>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                    value="{{ $pendaftaran->tanggal_lahir}}">
            </div>
            <div class=" col-md-6 ">
                <div class=" input-group">
                    <label for="phone_number" class="input-group mb-2">Nomor Telepon (WA)</label>
                    <div class="input-group-text">+62</div>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        placeholder="81234567890" value="{{ $pendaftaran->phone_number}}">
                </div>
            </div>
            <div class=" col-md-12">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Alamat"
                    value="{{ $pendaftaran->address}}">
            </div>

            @else

            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ auth()->user()->mahasiswa->name }}" disabled>
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
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                    placeholder="Tempat Lahir">
            </div>
            <div class="col-md-6">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select type="text" class="form-select" name="angkatan" id="angkatan">
                    <option disabled selected>Pilih...</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
            </div>
            <div class="col-md-6 ">
                <div class="input-group">
                    <label for="phone_number" class="input-group mb-2">Nomor Telepon (WA)</label>
                    <div class="input-group-text">+62</div>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        placeholder="81234567890">
                </div>
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Alamat">
            </div>
            @endif
            <div class="col-12 mt-4">
                <a class="btn " href="/mahasiswa" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem ; background-color:#ff8c1a;">Next</button>
            </div>
            <div style=" height: 100px;">
            </div>
        </form>
    </form>
</div>
@endsection