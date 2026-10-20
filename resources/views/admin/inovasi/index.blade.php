@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('inovasi.admin.create') }}" type="button" class="btn btn-primary">Tambah</a>
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
                            <th scope="row">{{ $inovasiMasyarakat->firstItem() + $loop->index }}</th>
                            <td>{{ $item->nama_inovasi }}</td>
                            <td>{{ $item->nama_inisiator }}</td>
                            <td>{{ $item->bentuk }}</td>
                            <td>{{ $item->tahapan }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->waktu_penerapan }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <div class="d-flex gap-1 align-items-center">
                                    <a href="{{ route('inovasi.admin.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <x-bi-pencil-square style="width: 1em; height: 1em;" />
                                    </a>
                                    <a href="{{ route('inovasi.admin.export-pdf-single', $item->id) }}" class="btn btn-success btn-sm text-white">
                                        <x-bi-file-earmark-pdf style="width: 1em; height: 1em;" />
                                    </a>

                                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                        action="{{ route('inovasi.admin.destroy', $item->id) }}" method="POST"
                                        class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm text-white">
                                            <x-bi-trash-fill style="width: 1em; height: 1em;" />
                                        </button>
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
            <div class="mt-3">
                {{ $inovasiMasyarakat->links() }}
            </div>
        </div>
    </div>
@endsection
