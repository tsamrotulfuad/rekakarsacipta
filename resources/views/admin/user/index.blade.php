@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('users.admin.create') }}" type="button" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card mt-4 p-3">
        <div class="table-responsive">
            <table class="table table-hover table-border caption-top ">
                <caption>Daftar User</caption>
                <thead>
                    <tr>
                        <th scope="col" style="width: 2%">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Tanggal Verifikasi</th>
                        <th scope="col" style="width: 10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + $items->firstItem() }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->email_verified_at }}</td>
                            <td>
                                <div class="d-flex gap-1 align-items-center">
                                    <a href="{{ route('users.admin.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    @if ($item->inovasi_count > 0)
                                        <button type="button" class="btn btn-secondary btn-sm text-white" disabled
                                            title="User masih memiliki data inovasi">
                                            Hapus
                                        </button>
                                    @else
                                        <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                            action="{{ route('users.admin.destroy', $item->id) }}" method="POST"
                                            class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm text-white">Hapus</button>
                                        </form>
                                    @endif
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
    {{ $user->links() }}
</div>
        </div>
    </div>
@endsection
