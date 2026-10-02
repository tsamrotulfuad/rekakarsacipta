@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Kategori Masyarakat
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h5 class="card-title fw-bolder">Proposal Inovasi</h5>
            </div>

            <form class="row g-3">
                <div class="col-md-12">
                    <label for="nama_inovasi" class="form-label">Nama Inovasi</label>
                    <input type="text" class="form-control" name="nama_inovasi" id="nama_inovasi" placeholder="Masukkan nama inovasi">
                </div>
                <div class="col-md-6">
                    <label for="nama_inisiator" class="form-label">Nama Inisiator</label>
                    <input type="text" class="form-control" name="nama_inisiator" id="nama_inisiator" placeholder="Masukkan nama inisiator">
                </div>
                <div class="col-md-6">
                    <label for="hp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" name="hp" id="hp" placeholder="Masukkan nomor hp">
                </div>
                <div class="col-md-6">
                    <label for="ktp" class="form-label">KTP</label>
                    <input type="text" class="form-control" name="ktp" id="ktp" placeholder="Masukkan nomor ktp">
                </div>
                <div class="col-md-6">
                    <label for="bentuk" class="form-label">Bentuk</label>
                    <select class="form-select" aria-label="Bentuk" name="bentuk">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="tahapan" class="form-label">Tahapan</label>
                    <select class="form-select" aria-label="Tahapan" name="tahapan">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select class="form-select" aria-label="jenis" name="jenis">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="waktu_ujicoba" class="form-label">Waktu Ujicoba</label>
                    <input type="date" class="form-control" id="waktu_ujicoba">
                </div>
                <div class="col-md-6">
                    <label for="waktu_penerapan" class="form-label">Waktu Penerapan</label>
                    <input type="date" class="form-control" id="waktu_penerapan">
                </div>
                <div class="col-md-12">
                    <label for="rancang_bangun" class="form-label">Rancang Bangun</label>
                    <x-rich-text-editor name="rancang_bangun" :value="old('rancang_bangun')" />

                </div>
                <div class="cols-md-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <x-rich-text-editor name="tujuan" :value="old('tujuan')" />

                </div>
                <div class="cols-md-12">
                    <label for="manfaat" class="form-label">Manfaat</label>
                    <x-rich-text-editor name="manfaat" :value="old('manfaat')" />

                </div>
                <div class="cols-md-12">
                    <label for="hasil" class="form-label">Hasil</label>
                    <x-rich-text-editor name="hasil" :value="old('hasil')" />

                </div>
                <div class="col-md-6">
                    <label for="penghargaan" class="form-label">Penghargaan</label>
                    <input type="file" class="form-control" id="penghargaan">
                </div>
                <div class="col-md-6">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select class="form-select" aria-label="tahun">
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('proposals') }}" type="button" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>

    </div>
    </div>
@endsection
