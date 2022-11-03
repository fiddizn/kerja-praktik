@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">{{ $title }}</h2>

<div class="row align-items-start mt-3">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly
                value="{{ $penilaianseminar->mahasiswa->nim }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $penilaianseminar->mahasiswa->name }}">
        </div>
        <div class="col-6 my-3">
            <h5 style="text-align:center;">Pembimbing</h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Aspek Penilaian</th>
                        <th scope="col">P1 ({{ $penilaianseminar->pembimbing1->dosen->kode }})</th>
                        <th scope="col">P2 ({{ $penilaianseminar->pembimbing2->dosen->kode }})</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Materi Penelitian Tugas Akhir</td>
                        <td>{{ $penilaianseminar->p1_materi }}</td>
                        <td>{{ $penilaianseminar->p2_materi }}</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Pencapaian Target</td>
                        <td>{{ $penilaianseminar->p1_pencapaian }}</td>
                        <td>{{ $penilaianseminar->p2_pencapaian }}</td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Aspek Kedisiplinan</td>
                        <td>{{ $penilaianseminar->p1_kedisiplinan }}</td>
                        <td>{{ $penilaianseminar->p2_kedisiplinan }}</td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>Pemahaman Teori Penunjang dan Penelitian</td>
                        <td>{{ $penilaianseminar->p1_pemahaman }}</td>
                        <td>{{ $penilaianseminar->p2_pemahaman }}</td>
                    </tr>
                    <tr>
                        <td scope="row">5</td>
                        <td>Teknik Presentasi</td>
                        <td>{{ $penilaianseminar->p1_presentasi }}</td>
                        <td>{{ $penilaianseminar->p2_presentasi }}</td>
                    </tr>
                    <tr>
                        <td scope="row">6</td>
                        <td>Dokumentasi</td>
                        <td>{{ $penilaianseminar->p1_dokumentasi }}</td>
                        <td>{{ $penilaianseminar->p2_dokumentasi }}</td>
                    </tr>
                    <tr>
                        <td scope="row">7</td>
                        <td>Rumusan Masalah</td>
                        <td>{{ $penilaianseminar->p1_rumusanMasalah }}</td>
                        <td>{{ $penilaianseminar->p2_rumusanMasalah }}</td>
                    </tr>
                    <tr>
                        <td scope="row">8</td>
                        <td>Metode Penelitian dan Pustaka</td>
                        <td>{{ $penilaianseminar->p1_metodeDanPustaka }}</td>
                        <td>{{ $penilaianseminar->p2_metodeDanPustaka }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6 my-3">
            <h5 style="text-align:center;">Reviewer</h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Aspek Penilaian</th>
                        <th scope="col">R1 ({{ $penilaianseminar->reviewer1->dosen->kode }})</th>
                        <th scope="col">R2 ({{ $penilaianseminar->reviewer2->dosen->kode }})</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Teknik Presentasi</td>
                        <td>{{ $penilaianseminar->r1_presentasi }}</td>
                        <td>{{ $penilaianseminar->r2_presentasi }}</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Dokumentasi</td>
                        <td>{{ $penilaianseminar->r1_dokumentasi }}</td>
                        <td>{{ $penilaianseminar->r2_dokumentasi }}</td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Rumusan Masalah</td>
                        <td>{{ $penilaianseminar->r1_rumusanMasalah }}</td>
                        <td>{{ $penilaianseminar->r2_rumusanMasalah }}</td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>Metode Penelitian dan Pustaka</td>
                        <td>{{ $penilaianseminar->r1_metodeDanPustaka }}</td>
                        <td>{{ $penilaianseminar->r2_metodeDanPustaka }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 my-2">
            <a class="btn" href="/koordinator/penilaian-seminar" role="button"
                style="width: 5rem;background-color:#ff8c1a;">Back</a>
        </div>
    </div>
    @endsection