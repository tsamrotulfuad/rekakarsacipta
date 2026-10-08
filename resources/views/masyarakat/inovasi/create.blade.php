@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Kategori Masyarakat
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h5 class="card-title fw-bolder">1. Proposal Inovasi</h5>
            </div>

            <form action="{{ route('inovasi.masyarakat.store') }}" method="POST" enctype="multipart/form-data" class="row g-3" >
                @csrf
                <div class="col-md-12">
                    <label for="nama_inovasi" class="form-label">Nama Inovasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_inovasi" id="nama_inovasi"
                        placeholder="Masukkan nama inovasi">
                </div>
                <div class="col-md-6">
                    <label for="nama_inisiator" class="form-label">Nama Inisiator <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_inisiator" id="nama_inisiator"
                        placeholder="Masukkan nama inisiator">
                </div>
                <div class="col-md-6">
                    <label for="hp" class="form-label">No. HP <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="hp" id="hp"
                        placeholder="Masukkan nomor HP">
                </div>
                <div class="col-md-6">
                    <label for="ktp" class="form-label">KTP <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="ktp" id="ktp"
                        placeholder="Masukkan nomor KTP">
                </div>
                <div class="col-md-6">
                    <label for="bentuk" class="form-label">Bentuk <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Bentuk" name="bentuk">
                        <option value disabled selected>Pilih Bentuk</option>
                        <option value="Aplikasi Teknologi">Aplikasi Teknologi</option>
                        <option value="Produk Jasa">Produk Jasa</option>
                        <option value="Program Pergerakan">Program Pergerakan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="tahapan" class="form-label">Tahapan <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Tahapan" name="tahapan">
                        <option value disabled selected>Pilih Tahapan</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Ujicoba">Ujicoba</option>
                        <option value="Penerapan">Penerapan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="jenis" class="form-label">Jenis <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="jenis" name="jenis">
                        <option value disabled selected>Pilih Jenis</option>
                        <option value="Digital">Digital</option>
                        <option value="Non Digital">Non Digital</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="waktu_ujicoba" class="form-label">Waktu Ujicoba <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="waktu_ujicoba" name="waktu_ujicoba">
                </div>
                <div class="col-md-6">
                    <label for="waktu_penerapan" class="form-label">Waktu Penerapan <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="waktu_penerapan" name="waktu_penerapan">
                </div>
                <div class="col-md-12">
                    <label for="rancang_bangun" class="form-label">Rancang Bangun <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="rancang_bangun" :value="old('rancang_bangun')" />

                </div>
                <div class="cols-md-12">
                    <label for="tujuan" class="form-label">Tujuan <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="tujuan" :value="old('tujuan')" />

                </div>
                <div class="cols-md-12">
                    <label for="manfaat" class="form-label">Manfaat <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="manfaat" :value="old('manfaat')" />

                </div>
                <div class="cols-md-12">
                    <label for="hasil" class="form-label">Hasil <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="hasil" :value="old('hasil')" />

                </div>
                <div class="col-md-6">
                    <label for="penghargaan" class="form-label">Penghargaan</label>
                    <input type="file" class="form-control" id="penghargaan" name="penghargaan">
                </div>
                <div class="col-md-6">
                    <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="tahun" name="tahun">
                        <option value disabled selected>Pilih Tahun</option>
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div>
                    <hr class="divider">
                </div>
                <div class="mb-2">
                    <h5 class="card-title fw-bolder">2. Indikator Inovasi</h5>
                </div>
                <div class="col-md-12">
                    <label for="kemudahan_proses" class="form-label">Kemudahan Proses <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="kemudahan_proses" :value="old('kemudahan_proses')" />

                </div>
                <div class="col-md-12">
                    <label for="keterlibatan_aktor" class="form-label">Keterlibatan Aktor <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="keterlibatan_aktor" :value="old('keterlibatan_aktor')" />

                </div>
                <div class="col-md-6">
                    <label for="sosialisasi" class="form-label">Sosialisasi <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="tahun" name="sosialisasi">
                        <option value disabled selected>Pilih Sosialisasi</option>
                        <option value="Media Berita">Media Berita</option>
                        <option value="Konten Media Sosial">Konten Media Sosial</option>
                        <option value="20Foto Sosialisasi24">Foto Sosialisasi</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sosialisasi_upload" class="form-label">Upload Sosialisasi <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="sosialisasi_upload" id="sosialisasi_upload">
                </div>
                <div class="col-md-12">
                    <label for="kemanfaatan" class="form-label">Kemanfaatan <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="kemanfaatan" :value="old('kemanfaatan')" />

                </div>
                <div class="col-md-6">
                    <label for="kemanfaatan_upload" class="form-label">Upload Kemanfaatan <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="kemanfaatan_upload" id="kemanfaatan_upload">
                </div>

                <div class="col-md-6">
                    <label for="kualitas_video" class="form-label">Kualitas Video <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kualitas_video" id="kualitas_video"
                        placeholder="Masukkan link Youtube atau Instagram atau lainnya">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('inovasi.masyarakat.index')}}" type="button" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </div>
@endsection
