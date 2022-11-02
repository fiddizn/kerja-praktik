@extends('layouts/main')
@section('container')

<h2 class="text-center">Plotting Dosen {{ $plotting_dosen }}</h2>

<div class="row align-items-start">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly
                value="{{ $pendaftaran->mahasiswa->nim }}" disabled>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $pendaftaran->mahasiswa->name }}" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row my-4">
            <div class="col-md-6">
                <h5>Pembimbing 1</h5>
                <label for="p1_alt1" class="col-sm-6 col-form-label">Alternatif 1</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt1_p1)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt1_p1 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt1_p1 }}" disabled>
                </div>
                <label class="col-sm-6 col-form-label">Alternatif 2</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt2_p1)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt2_p1 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt2_p1 }}" disabled>
                </div><label class="col-sm-6 col-form-label">Alternatif 3</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt3_p1)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt3_p1 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt3_p1 }}" disabled>
                </div><label class="col-sm-6 col-form-label">Alternatif 4</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt4_p1)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt4_p1 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt4_p1 }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <h5>Pembimbing 2</h5>
                <label class="col-sm-6 col-form-label">Alternatif 1</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt1_p2)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt1_p2 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt1_p2 }}" disabled>
                </div>
                <label class="col-sm-6 col-form-label">Alternatif 2</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt2_p2)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt2_p2 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt2_p2 }}" disabled>
                </div>
                <label class="col-sm-6 col-form-label">Alternatif 3</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt3_p2)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt3_p2 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt3_p2 }}" disabled>
                </div><label class="col-sm-6 col-form-label">Alternatif 4</label>
                <div class="col">
                    <input type="text" readonly class="form-control
                    <<?php
                        if (!isset($pendaftaran->persetujuan_alt4_p2)) {
                            echo "";
                        } elseif ($pendaftaran->persetujuan_alt4_p2 == true) {
                            echo " is-valid";
                        } else {
                            echo " is-invalid";
                        }
                        ?>
                    " value="{{ $pendaftaran->alt4_p2 }}" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <table class="table table-hover mt-3" style="min-height: 210px;">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">P1</th>
                    <th scope="col">P2</th>
                </tr>
            </thead>
            @foreach ($list_dosen as $key=> $dosen)
            <tbody>
                <tr>
                    <th scope="row">{{$list_dosen->firstItem()+ $key}}</th>
                    <td>{{ $dosen->name }}</td>
                    <td>{{ $dosen->jabfung->name }}</td>
                    @if ($dosen->pembimbing1 != null)
                    <td>{{ $pendaftarans->where('p1_id',$dosen->pembimbing1->id)->count() }}</td>
                    @else
                    <td>-</td>
                    @endif
                    <td>{{ $pendaftarans->where('p2_id',$dosen->pembimbing2->id)->count() }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{ $list_dosen->links() }}
        @if ($plotting_dosen == 'Pembimbing')
        <form id="formPlottingP1P2" action="/koordinator/plotting-dosen-pembimbing/{{ $pendaftaran->id }}"
            method="post">
            @method('put')
            @csrf
            <div class="row">
                @if ($pendaftaran->mahasiswa->p1_id == null)
                <label for="p1" class="col-sm-6 col-form-label">Pembimbing 1</label>
                <div class="col">
                    <select type="text" class="form-select" name="p1" id="p1">
                        <option selected disabled>Pilih...</option>
                        @foreach ($list_p1 as $p1)
                        <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                        @endforeach
                    </select>
                </div>
                @else
                <label for="p1" class="col-sm-6 col-form-label">Pembimbing 1 (Update)</label>
                <div class="col">
                    <select type="text" class="form-select" name="p1" id="p1">
                        <option selected disabled>Pilih...</option>
                        @foreach ($list_p1 as $p1)
                        <option>{{ $p1->dosen->name }} ({{ $p1->dosen->jabfung->name }})</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if ($pendaftaran->mahasiswa->p2_id == null)
                <label for="p2" class="col-sm-6 col-form-label mt-2">Pembimbing 2</label>
                <div class="col">
                    <select type="text" class="form-select mt-2" name="p2" id="p2">
                        <option selected disabled>Pilih...</option>
                        @foreach ($list_p2 as $p2)
                        <option>{{ $p2->dosen->name }} ({{ $p2->dosen->jabfung->name }})</option>
                        @endforeach
                    </select>
                </div>
                @else
                <label for="p2" class="col-sm-6 col-form-label mt-2">Pembimbing 2 (Update)</label>
                <div class="col">
                    <select type="text" class="form-select mt-2" name="p2" id="p2">
                        <option selected disabled>Pilih...</option>
                        @foreach ($list_p2 as $p2)
                        <option>{{ $p2->dosen->name }} ({{ $p2->dosen->jabfung->name }})</option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
        </form>
        @endif
    </div>
</div>
<div class="row mt-2">
    @if ($plotting_dosen == 'Pembimbing')
    <a class="btn" href="/koordinator/plotting-dosen-pembimbing" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    @elseif ($plotting_dosen == 'Reviewer')
    <a class="btn" href="/koordinator/plotting-dosen-reviewer" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    @else
    <a class="btn" href="/koordinator/plotting-dosen-penguji" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    @endif
    <button form="formPlottingP1P2" type="submit" class="btn ms-3"
        style="width: 5rem;background-color:#ff8c1a;">Sumbit</button>
</div>
<script type="text/javascript" src="/js/validasiJabfunP1P2.js"></script>
<script type="text/javascript" src="/js/validasiP1P2.js"></script>
@endsection