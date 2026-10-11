@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h5 class="card-title fw-bolder">Tambah User</h5>
            </div>

            <form action="{{ route('users.admin.store') }}" method="POST" class="row g-3" >
                @csrf
                <div class="col-md-12">
                    <label for="name" class="form-label">Nama User <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Masukkan nama user">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Masukkan email">
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Masukkan password">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('users.admin.index')}}" type="button" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </div>
@endsection
