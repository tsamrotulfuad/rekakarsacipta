@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('proposals.create') }}" type="button" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card mt-4 p-3">
            <table class="table table-hover table-borderless caption-top">
                <caption>Daftar Inovasi</caption>
                <thead>
                    <tr>
                        <th scope="col" style="width: 2%">#</th>
                        <th scope="col">Nama Inovasi</th>
                        <th scope="col">Insiator</th>
                        <th scope="col">Bentuk</th>
                        <th scope="col">Tahapan</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Waktu Penerapan</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>@twitter</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
 
    </div>
@endsection
