@extends('layouts/main')
@section('container')

<h2 class="text-center">Plotting Dosen Pembimbing</h2>

<div class="row align-items-start">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly value="{{ $mahasiswa->nim }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $mahasiswa->mahasiswa->name }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row my-4">
            <div class="col-md-6">
                <h5>Alternatif 1</h5>
                <label for="p1_alt1" class="col-sm-6 col-form-label">Pembimbing 1</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p1_alt1" value="{{ $mahasiswa->alt1_p1 }}">
                </div>
                <label for="p2_alt1" class="col-sm-6 col-form-label">Pembimbing 2</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p2_alt1" value="{{ $mahasiswa->alt1_p2 }}">
                </div>
            </div>
            <div class="col-md-6">
                <h5>Alternatif 2</h5>
                <label for="p1_alt2" class="col-sm-6 col-form-label">Pembimbing 1</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p1_alt2" value="{{ $mahasiswa->alt2_p1 }}">
                </div>
                <label for="p2_alt2" class="col-sm-6 col-form-label">Pembimbing 2</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p2_alt2" value="{{ $mahasiswa->alt2_p2 }}">
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-6">
                <h5>Alternatif 3</h5>
                <label for="p1_alt3" class="col-sm-6 col-form-label">Pembimbing 1</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p1_alt3" value="{{ $mahasiswa->alt3_p1 }}">
                </div>
                <label for="p2_alt3" class="col-sm-6 col-form-label">Pembimbing 2</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p2_alt3" value="{{ $mahasiswa->alt3_p2 }}">
                </div>
            </div>
            <div class="col-md-6">
                <h5>Alternatif 4</h5>
                <label for="p1_alt4" class="col-sm-6 col-form-label">Pembimbing 1</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p1_alt4" value="{{ $mahasiswa->alt4_p1 }}">
                </div>
                <label for="p2_alt4" class="col-sm-6 col-form-label">Pembimbing 2</label>
                <div class="col">
                    <input type="text" readonly class="form-control" id="p2_alt4" value="{{ $mahasiswa->alt4_p2 }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>SGD</td>
                    <td>Guru Besar</td>
                    <td>4</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>OPR</td>
                    <td>Lektor Kepala</td>
                    <td>5</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>HGT</td>
                    <td>Lektor</td>
                    <td>2</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>YTU</td>
                    <td>Asisten Ahli</td>
                    <td>4</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>PVT</td>
                    <td>Non-Jabfung</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
        <form action="/koordinator/plotting-dosen-pembimbing" method="GET">
            <div class="row>
                <label for=" p1_alt4" class="col-sm-6 col-form-label">Pembimbing 1</label>
                <div class="col">
                    <select type="text" class="form-select" name="p1" id="p1">
                        <option selected>Pilih...</option>
                        <option>Genta Febi</option>
                        <option>Nurul Widiastuti</option>
                    </select>
                </div>
                <label for="p2_alt4" class="col-sm-6 col-form-label">Pembimbing 2</label>
                <div class="col">
                    <select type="text" class="form-select" name="p2" id="p2">
                        <option selected>Pilih...</option>
                        <option>Wisnu Olga</option>
                        <option>Tania Farida</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row mt-2">
    <a class="btn" href="/koordinator/plotting-dosen-pembimbing" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    <button type="submit" class="btn ms-3" style="width: 5rem;background-color:#ff8c1a;">Submit</button>
</div>


<div style=" height: 100px;">
</div>
@endsection