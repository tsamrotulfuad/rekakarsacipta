@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="mb-3">
            <a href="{{ route('inovasi.masyarakat.create') }}" type="button" class="btn btn-primary">
               Tambah Inovasi
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mb-3 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-3">{{ $totalInovasi }}</h1>
                    <p class="card-text">Inovasi</p>
                </div>
            </div>
        </div>
    </div>
@endsection
