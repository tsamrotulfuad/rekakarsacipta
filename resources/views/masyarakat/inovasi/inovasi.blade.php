@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('inovasi.masyarakat.create') }}" type="button" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card mt-4 p-3">
        <div class="table-responsive">
            <table class="table table-hover table-border caption-top ">
                <caption>Daftar Inovasi</caption>
                <thead>
                    <tr>
                        <th scope="col" style="width: 2%">#</th>
                        <th scope="col">Nama Inovasi</th>
                        <th scope="col">Insiator</th>
                        <th scope="col" style="width: 4%">Bentuk</th>
                        <th scope="col">Tahapan</th>
                        <th scope="col">Jenis</th>
                        <th scope="col" style="width: 4%">Waktu Penerapan</th>
                        <th scope="col">User ID</th>
                        <th scope="col" style="width: 10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inovasiMasyarakat as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_inovasi }}</td>
                            <td>{{ $item->nama_inisiator }}</td>
                            <td>{{ $item->bentuk }}</td>
                            <td>{{ $item->tahapan }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->waktu_penerapan }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>
                                <div class="d-flex gap-1 align-items-center">
                                    <a href="{{ route('inovasi.masyarakat.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                        action="{{ route('inovasi.masyarakat.destroy', $item->id) }}" method="POST"
                                        class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm text-white">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="p-3 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
