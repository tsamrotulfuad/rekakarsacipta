@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Tambah Inovasi
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h5 class="card-title fw-bolder">1. Proposal Inovasi</h5>
            </div>

            <form action="{{ route('inovasi.masyarakat.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <label for="nama_inovasi" class="form-label">Nama Inovasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_inovasi') is-invalid @enderror"
                        name="nama_inovasi" id="nama_inovasi" value="{{ old('nama_inovasi') }}"
                        placeholder="Masukkan nama inovasi" required>
                    @error('nama_inovasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="nama_inisiator" class="form-label">Nama Inisiator <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_inisiator') is-invalid @enderror"
                        name="nama_inisiator" id="nama_inisiator" value="{{ old('nama_inisiator') }}"
                        placeholder="Masukkan nama inisiator" required>
                    @error('nama_inisiator')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" id="kategori"
                        required>
                        <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>Pilih Kategori</option>
                        <option value="Perangkat Daerah" disabled>Perangkat Daerah</option>
                        <option value="Sekolah Negeri" disabled>Sekolah Negeri</option>
                        <option value="Sekolah Swasta" @selected(old('kategori') == 'Sekolah Swasta')>Sekolah Swasta</option>
                        <option value="Masyarakat" @selected(old('kategori') == 'Masyarakat')>Masyarakat</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <input type="text" class="form-control @error('asal_instansi') is-invalid @enderror"
                        name="asal_instansi" id="asal_instansi" value="{{ old('asal_instansi') }}"
                        placeholder="Masukkan Asal Instansi">
                    @error('asal_instansi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="hp" class="form-label">No. HP <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp"
                        id="hp" value="{{ old('hp') }}" placeholder="Masukkan nomor HP" required>
                    @error('hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="ktp" class="form-label">KTP <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp"
                        id="ktp" value="{{ old('ktp') }}" placeholder="Masukkan nomor KTP" required>
                    @error('ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="skd" class="form-label">Surat Keterangan Domisili / SKKT / SKTS (Format .pdf / max. 2mb)</label>
                    <input type="file" class="form-control @error('skd') is-invalid @enderror" name="skd"
                        id="skd">
                    @error('skd')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="bentuk" class="form-label">Bentuk <span class="text-danger">*</span></label>
                    <select class="form-select @error('bentuk') is-invalid @enderror" name="bentuk" id="bentuk"
                        required>
                        <option value="" disabled {{ old('bentuk') ? '' : 'selected' }}>Pilih Bentuk</option>
                        <option value="Aplikasi Teknologi" @selected(old('bentuk') == 'Aplikasi Teknologi')>Aplikasi Teknologi</option>
                        <option value="Produk Jasa" @selected(old('bentuk') == 'Produk Jasa')>Produk Jasa</option>
                        <option value="Program Pergerakan" @selected(old('bentuk') == 'Program Pergerakan')>Program Pergerakan</option>
                    </select>
                    @error('bentuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="tahapan" class="form-label">Tahapan <span class="text-danger">*</span></label>
                    <select class="form-select @error('tahapan') is-invalid @enderror" name="tahapan" id="tahapan"
                        required>
                        <option value="" disabled {{ old('tahapan') ? '' : 'selected' }}>Pilih Tahapan</option>
                        <option value="Inisiatif" @selected(old('tahapan') == 'Inisiatif')>Inisiatif</option>
                        <option value="Ujicoba" @selected(old('tahapan') == 'Ujicoba')>Ujicoba</option>
                        <option value="Penerapan" @selected(old('tahapan') == 'Penerapan')>Penerapan</option>
                    </select>
                    @error('tahapan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="jenis" class="form-label">Jenis <span class="text-danger">*</span></label>
                    <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" id="jenis"
                        required>
                        <option value="" disabled {{ old('jenis') ? '' : 'selected' }}>Pilih Jenis</option>
                        <option value="Digital" @selected(old('jenis') == 'Digital')>Digital</option>
                        <option value="Non Digital" @selected(old('jenis') == 'Non Digital')>Non Digital</option>
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="waktu_ujicoba" class="form-label">Waktu Ujicoba <span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('waktu_ujicoba') is-invalid @enderror"
                        id="waktu_ujicoba" name="waktu_ujicoba" value="{{ old('waktu_ujicoba') }}" required>
                    @error('waktu_ujicoba')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="waktu_penerapan" class="form-label">Waktu Penerapan <span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('waktu_penerapan') is-invalid @enderror"
                        id="waktu_penerapan" name="waktu_penerapan" value="{{ old('waktu_penerapan') }}" required>
                    @error('waktu_penerapan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="rancang_bangun" class="form-label">Rancang Bangun <span
                            class="text-danger">*</span></label>
                    <x-rich-text-editor name="rancang_bangun" :value="old('rancang_bangun')" id="rancang_bangun" required />
                    @error('rancang_bangun')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="tujuan" class="form-label">Tujuan <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="tujuan" :value="old('tujuan')" id="tujuan" required />
                    @error('tujuan')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="manfaat" class="form-label">Manfaat <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="manfaat" :value="old('manfaat')" id="manfaat" required />
                    @error('manfaat')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="hasil" class="form-label">Hasil <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="hasil" :value="old('hasil')" id="hasil" required />
                    @error('hasil')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="penghargaan" class="form-label">Penghargaan</label>
                    <input type="file" class="form-control @error('penghargaan') is-invalid @enderror"
                        name="penghargaan" id="penghargaan">
                    @error('penghargaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                    <select class="form-select @error('tahun') is-invalid @enderror" name="tahun" id="tahun"
                        required>
                        <option value="" disabled {{ old('tahun') ? '' : 'selected' }}>Pilih Tahun</option>
                        <option value="2026" @selected(old('tahun') == '2026')>2026</option>
                        <option value="2025" @selected(old('tahun') == '2025')>2025</option>
                        <option value="2024" @selected(old('tahun') == '2024')>2024</option>
                    </select>
                    @error('tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <hr class="divider">
                </div>

                <div class="mb-2">
                    <h5 class="card-title fw-bolder">2. Indikator Inovasi</h5>
                </div>

                <div class="col-md-12">
                    <label for="kemudahan_proses" class="form-label">Kemudahan Proses <span
                            class="text-danger">*</span></label>
                    <x-rich-text-editor name="kemudahan_proses" :value="old('kemudahan_proses')" id="kemudahan_proses" required />
                    @error('kemudahan_proses')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="keterlibatan_aktor" class="form-label">Keterlibatan Aktor <span
                            class="text-danger">*</span></label>
                    <x-rich-text-editor name="keterlibatan_aktor" :value="old('keterlibatan_aktor')" id="keterlibatan_aktor" required />
                    @error('keterlibatan_aktor')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="sosialisasi" class="form-label">Sosialisasi <span class="text-danger">*</span></label>
                    <select class="form-select @error('sosialisasi') is-invalid @enderror" name="sosialisasi"
                        id="sosialisasi" required>
                        <option value="" disabled {{ old('sosialisasi') ? '' : 'selected' }}>Pilih Sosialisasi
                        </option>
                        <option value="Media Berita" @selected(old('sosialisasi') == 'Media Berita')>Media Berita</option>
                        <option value="Konten Media Sosial" @selected(old('sosialisasi') == 'Konten Media Sosial')>Konten Media Sosial</option>
                        <option value="Foto Sosialisasi" @selected(old('sosialisasi') == 'Foto Sosialisasi')>Foto Sosialisasi</option>
                    </select>
                    @error('sosialisasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="sosialisasi_upload" class="form-label">Upload Sosialisasi <span
                            class="text-danger">*</span> (Format .pdf dalam satu file / max. 2Mb)</label>
                    <input type="file" class="form-control @error('sosialisasi_upload') is-invalid @enderror"
                        name="sosialisasi_upload" id="sosialisasi_upload" required>
                    @error('sosialisasi_upload')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="kemanfaatan" class="form-label">Kemanfaatan <span class="text-danger">*</span></label>
                    <x-rich-text-editor name="kemanfaatan" :value="old('kemanfaatan')" id="kemanfaatan" required />
                    @error('kemanfaatan')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="kemanfaatan_upload" class="form-label">Upload Kemanfaatan <span
                            class="text-danger">*</span> (Format .pdf dalam satu file / max. 2Mb)</label>
                    <input type="file" class="form-control @error('kemanfaatan_upload') is-invalid @enderror"
                        name="kemanfaatan_upload" id="kemanfaatan_upload" required>
                    @error('kemanfaatan_upload')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="kualitas_video" class="form-label">Kualitas Video <span
                            class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('kualitas_video') is-invalid @enderror"
                        name="kualitas_video" id="kualitas_video" value="{{ old('kualitas_video') }}"
                        placeholder="Link Youtube / Instagram / Tiktok" required>
                    @error('kualitas_video')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('inovasi.masyarakat.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
