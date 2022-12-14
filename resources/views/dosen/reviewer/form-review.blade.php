@extends('layouts/main')
@section('container')
<h2 class="text-center">Form Review Proposal</h2>
<form id="formReview" action="/dosen/reviewer-1/review-proposal/formReview-{{ $review->id }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="row align-items-start mt-2">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim" readonly disabled
                    value="{{ $review->mahasiswa->nim }}" required>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" readonly disabled
                    value="{{ $review->mahasiswa->name }}" required>
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">Judul Proposal</label>
                <input type="text" class="form-control" name="name" id="name" readonly disabled
                    value="{{ $review->pendaftaran->judul_ta1 }}" required>
            </div>
        </div>
        @if($review->pendaftaran->peminatan == "AIG")
        <div class="row g-3">
            <div class="col-md-4">
                <label for="penilaian1" class="form-label">Kreatifitas (originalitas, unik dan bermanfaat)</label>
                <select type="text" class="form-select" name="penilaian1" id="penilaian1" autofocus required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Baik</option>
                    <option>Cukup</option>
                    <option>Kurang</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="penilaian2" class="form-label">Perumusan Masalah (focus, jelas dan terarah)</label>
                <select type="text" class="form-select" name="penilaian2" id="penilaian2" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Baik</option>
                    <option>Cukup</option>
                    <option>Kurang</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="penilaian3" class="form-label">Kesesuaian dan kemutakhiran metode penelitian</label>
                <select type="text" class="form-select" name="penilaian3" id="penilaian3" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Baik</option>
                    <option>Cukup</option>
                    <option>Kurang</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="penilaian4" class="form-label">Tinjauan pustaka (jumlah, kredibilitas, kejelasan,
                    kemutahiran)</label>
                <select type="text" class="form-select" name="penilaian4" id="penilaian4" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Baik</option>
                    <option>Cukup</option>
                    <option>Kurang</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="penilaian5" class="form-label">Kontribusi perkembangan ilmu pengetahuan dan
                    teknologi</label>
                <select type="text" class="form-select" name="penilaian5" id="penilaian5" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Baik</option>
                    <option>Cukup</option>
                    <option>Kurang</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="penilaian6" class="form-label">Pemaparan proposal (Bahasa, kesesuaian dengan panduan dan
                    tampilan)</label>
                <select type="text" class="form-select" name="penilaian6" id="penilaian6" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Baik</option>
                    <option>Cukup</option>
                    <option>Kurang</option>
                </select>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="hasil_review" class="form-label">Hasil Review</label>
                <select type="text" class="form-select" name="hasil_review" id="hasil_review" required>
                    <option value="" disabled selected>Pilih.. </option>
                    <option>Dilanjutkan</option>
                    <option>Dilanjutkan dengan perbaikan</option>
                    <option>Ganti Judul</option>
                </select>
            </div>
        </div>
        <div class="row g-3">
            <label for="komentar">Saran Perbaikan / Usulan Judul / DLL</label>
            <input id="komentar" type="hidden" name="komentar">
            <trix-editor input="komentar"></trix-editor>
            <input type="hidden" id="status" name="status" value="Lolos Bersyarat">
        </div>
        <div class="row g-3">
            <div class="col-md-5">
                <label for="proposal" class="form-label">Dokumen Proposal yang sudah diberi komentar/revisi</label>
                <input class="form-control @error('proposal') is-invalid @enderror" type="file" id="proposal"
                    name="proposal">
                <div id="proposal" class="invalid-feedback">File harus berupa WORD/PDF!</div>
            </div>
        </div>
        @else
        <div class="row align-items-start mt-2">
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="penilaian1" class="form-label">Orisinalitas Judul Skripsi<br> </label>
                    <select type="text" class="form-select" name="penilaian1" id="penilaian1" required>
                        <option value="" disabled selected>Pilih.. </option>
                        <option>Baik</option>
                        <option>Cukup</option>
                        <option>Kurang</option>
                    </select>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-md-8">
                    <label for="penilaian2" class="form-label">Kemampuan dalam menyampaikan abstraksi dan perumusan
                        masalah secara sistematis</label>
                    <select type="text" class="form-select" name="penilaian2" id="penilaian2" required>
                        <option value="" disabled selected>Pilih.. </option>
                        <option>Baik</option>
                        <option>Cukup</option>
                        <option>Kurang</option>
                    </select>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-md-8">
                    <label for="penilaian3" class="form-label">Kemampuan dalam menyampaikan abstraksi dan perumusan
                        masalah
                        secara sistematis</label>
                    <select type="text" class="form-select" name="penilaian3" id="penilaian3" required>
                        <option value="" disabled selected>Pilih.. </option>
                        <option>Baik</option>
                        <option>Cukup</option>
                        <option>Kurang</option>
                    </select>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-md-8">
                    <label for="penilaian4" class="form-label">Kebaruan topik / sub topik(Teori / Konsep / Bahasa
                        Pemrograman
                        /
                        Dll)</label>
                    <select type="text" class="form-select" name="penilaian4" id="penilaian4" required>
                        <option value="" disabled selected>Pilih.. </option>
                        <option>Baik</option>
                        <option>Cukup</option>
                        <option>Kurang</option>
                    </select>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-md-8">
                    <label for="penilaian5" class="form-label">Tinjauan Pustaka</label>
                    <select type="text" class="form-select" name="penilaian5" id="penilaian5" required>
                        <option value="" disabled selected>Pilih.. </option>
                        <option>Baik</option>
                        <option>Cukup</option>
                        <option>Kurang</option>
                    </select>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-md-8">
                    <label for="hasil_review" class="form-label">Hasil Review</label>
                    <select type="text" class="form-select" name="hasil_review" id="hasil_review" required>
                        <option value="" disabled selected>Pilih.. </option>
                        <option>Dilanjutkan</option>
                        <option>Dilanjutkan dengan perbaikan</option>
                        <option>Ganti Judul</option>
                    </select>
                </div>
            </div>
            <div class="row g-2">
                <label for="komentar">Saran Perbaikan / Usulan Judul / DLL</label>
                <input id="komentar" type="hidden" name="komentar">
                <trix-editor input="komentar"></trix-editor>
                <input type="hidden" id="status" name="status" value="Lolos Bersyarat">
            </div>
            <div class="row my-1">
                <div class="col-md-5">
                    <label for="proposal" class="form-label">Dokumen Proposal yang sudah diberi
                        komentar/revisi</label>
                    <input class="form-control @error('proposal') is-invalid @enderror" type="file" id="proposal"
                        name="proposal">
                    <div id="proposal" class="invalid-feedback">File harus berupa WORD/PDF!</div>
                </div>
            </div>
            @endif
            <div class="row g-3 mb-5">
                <div class="col-12">
                    <a class="btn" href="/dosen/reviewer-1/review-proposal" role="button"
                        style="width: 5rem;background-color:#ff8c1a;">Back</a>
                    <button type="submit" class="btn" style="width: 5rem;background-color:#ff8c1a;">Submit</button>
                </div>
            </div>
</form>
</div>
<script type="text/javascript" src="/js/requiredCatatanReviewP1.js"></script>
@endsection