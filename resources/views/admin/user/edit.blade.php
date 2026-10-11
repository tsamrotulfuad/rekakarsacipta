@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h5 class="card-title fw-bolder">Edit User</h5>
            </div>

            <form action="{{ route('users.admin.update', $user->id) }}" method="POST" class="row g-3" >
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label for="name" class="form-label">Nama  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('users.admin.index')}}" type="button" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </div>
@endsection