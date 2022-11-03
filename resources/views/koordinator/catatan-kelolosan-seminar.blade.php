@extends('layouts/main')
@section('container')
<h2 style="text-align:center;">Syarat</h2>
<form action="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}" method="post">
    @csrf
    <div class="row align-items-start mt-2">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim" readonly
                    value="{{ $pendaftaran->mahasiswa->nim }}">
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" readonly
                    value="{{ $pendaftaran->mahasiswa->name }}">
            </div>
        </div>
    </div>
    <div class="row g-3 my-3">
        <div class="form-group">
            @if ($status_kelolosan == 'tidak-lolos')
            <label>Mahasiswa di atas dinyatakan <b>tidak lolos</b> seleksi administrasi dengan
                alasan:</label>
            <div class="row ms-2 mt-2">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Nilai IPK dibawah 2.80" name="1" id="1">
                        <label class="form-check-label" for="1">
                            Nilai IPK dibawah 2.80
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="Jumlah SKS yang sudah lulus dan sedang diambil kurang dari 130" name="2" id="2">
                        <label class="form-check-label" for="2">
                            Jumlah SKS yang sudah lulus dan sedang diambil kurang dari 130
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Nilai D untuk MK Teori lebih dari 6 SKS"
                            name="3" id="3">
                        <label class="form-check-label" for="3">
                            Nilai D untuk MK Teori lebih dari 6 SKS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Nilai MK Algoritma tidak memenuhi syarat"
                            name="4" id="4">
                        <label class="form-check-label" for="4">
                            Nilai MK Algoritma tidak memenuhi syarat
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="Nilai MK Struktur Data tidak memenuhi syarat" name="5" id="5">
                        <label class="form-check-label" for="5">
                            Nilai MK Struktur Data tidak memenuhi syarat
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="Nilai MK Basis Data tidak memenuhi syarat" id="6" name="6">
                        <label class="form-check-label" for="6">
                            Nilai MK Basis Data tidak memenuhi syarat
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="Nilai MK Rekayasa Perangkat Lunak tidak memenuhi syarat" name="7" id="7">
                        <label class="form-check-label" for="7">
                            Nilai MK Rekayasa Perangkat Lunak tidak memenuhi syarat
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="Nilai MK Metode Penelitian tidak memenuhi syarat" id="8" name="8">
                        <label class="form-check-label" for="8">
                            Nilai MK Metode Penelitian tidak memenuhi syarat
                        </label>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Terdapat nilai E untuk MK Teori" name="9"
                            id="9">
                        <label class="form-check-label" for="9">
                            Terdapat nilai E untuk MK Teori
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Terdapat nilai D atau E untuk praktikum"
                            name="10" id="10">
                        <label class="form-check-label" for="10">
                            Terdapat nilai D atau E untuk praktikum
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Belum mengambil MK APPL" id="11"
                            name="11">
                        <label class="form-check-label" for="11">
                            Belum mengambil MK APPL
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Belum mengambil MK Pemrograman Web"
                            id="12" name="12">
                        <label class="form-check-label" for="12">
                            Belum mengambil MK Pemrograman Web
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Belum mengambil MK Prak Pemrograman Web"
                            id="13" name="13">
                        <label class="form-check-label" for="13">
                            Belum mengambil MK Prak Pemrograman Web
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Belum mengambil MK Pemrograman Objek 1"
                            id="14" name="14">
                        <label class="form-check-label" for="14">
                            Belum mengambil MK Pemrograman Objek 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="Belum mengambil MK Prak Pemrograman Objek 1" id="15" name="15">
                        <label class="form-check-label" for="15">
                            Belum mengambil MK Prak Pemrograman Objek 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sudah melunasi pembayaran semester"
                            id="16" name="16">
                        <label class="form-check-label" for="16">
                            Belum melunasi pembayaran semester
                        </label>
                    </div>
                </div>
            </div>
            <label class="my-3">Alasan lainnya :</label>
            <input id="keterangan_status" type="hidden" name="keterangan_status">
            <trix-editor input="keterangan_status"></trix-editor>
            <input type="hidden" id="status" name="status" value="Tidak Lolos">
            @else
            <div class="row align-items-start mt-2">
                <label for="keterangan_status">Mahasiswa di atas dinyatakan <b>lolos seleksi</b> administrasi dengan
                    <b>syarat </b>sebagai berikut:</label>
                <div class="row ms-2">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="IPK minimal 2.80" name="1" id="1">
                            <label class="form-check-label" for="1">
                                IPK minimal 2.80
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value=" Jumlah SKS yang sudah lulus dan sedang diambil mimimal 130" name="2" id="2">
                            <label class="form-check-label" for="2">
                                Jumlah SKS yang sudah lulus dan sedang diambil mimimal 130
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Nilai D untuk MK Teori maksimal 6 SKS" name="3" id="3">
                            <label class="form-check-label" for="3">
                                Nilai D untuk MK Teori maksimal 6 SKS
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="MK Algoritma minimal bernilai C"
                                name="4" id="4">
                            <label class="form-check-label" for="4">
                                MK Algoritma minimal bernilai C
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="MK Struktur Data minimal bernilai C"
                                name="5" id="5">
                            <label class="form-check-label" for="5">
                                MK Struktur Data minimal bernilai C
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="MK Basis Data minimal bernilai C"
                                id="6" name="6">
                            <label class="form-check-label" for="6">
                                MK Basis Data minimal bernilai C
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="MK Rekayasa Perangkat Lunak minimal bernilai C" name="7" id="7">
                            <label class="form-check-label" for="7">
                                MK Rekayasa Perangkat Lunak minimal bernilai C
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="MK Metode Penelitian minimal bernilai C" id="8" name="8">
                            <label class="form-check-label" for="8">
                                MK Metode Penelitian minimal bernilai C
                            </label>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tidak ada nilai E untuk MK Teori"
                                name="9" id="9">
                            <label class="form-check-label" for="9">
                                Tidak ada nilai E untuk MK Teori
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Tidak ada nilai D atau E untuk praktikum" name="10" id="10">
                            <label class="form-check-label" for="10">
                                Tidak ada nilai D atau E untuk praktikum
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sudah atau sedang mengambil MK APPL"
                                id="11" name="11">
                            <label class="form-check-label" for="11">
                                Sudah atau sedang mengambil MK APPL
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Sudah atau sedang mengambil MK Pemrograman Web" id="12" name="12">
                            <label class="form-check-label" for="12">
                                Sudah atau sedang mengambil MK Pemrograman Web
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Sudah atau sedang mengambil MK Prak Pemrograman Web" id="13" name="13">
                            <label class="form-check-label" for="13">
                                Sudah atau sedang mengambil MK Prak Pemrograman Web
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Sudah atau sedang mengambil MK Pemrograman Objek 1" id="14" name="14">
                            <label class="form-check-label" for="14">
                                Sudah atau sedang mengambil MK Pemrograman Objek 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Sudah atau sedang mengambil MK Prak Pemrograman Objek 1" id="15" name="15">
                            <label class="form-check-label" for="15">
                                Sudah atau sedang mengambil MK Prak Pemrograman Objek 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sudah melunasi pembayaran semester"
                                id="16" name="16">
                            <label class="form-check-label" for="16">
                                Sudah melunasi pembayaran semester
                            </label>
                        </div>
                    </div>
                </div>
                <label class="my-2">Syarat lainnya :</label>
                <input id="keterangan_status" type="hidden" name="keterangan_status">
                <trix-editor input="keterangan_status"></trix-editor>
                <input type="hidden" id="status" name="status" value="Lolos Bersyarat">
                @endif
            </div>
            <div class="col-12 mt-5">
                <a class="btn" href="/koordinator/list-pendaftaran-seminar-ta-1/{{ $pendaftaran->id }}" role="button"
                    style="width: 5rem;background-color:#ff8c1a;">Back</a>
                <button type="submit" class="btn" style="width: 5rem;background-color:#ff8c1a;">Submit</button>
            </div>
        </div>
    </div>
</form>

<div style=" height: 100px;">
</div>

<script>
document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault
})
</script>

@endsection