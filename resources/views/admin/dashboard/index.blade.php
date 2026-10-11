@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-2 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
      <h1 class="card-title mb-3">{{ $totalInovasi }}</h1>
        <p class="card-text">Inovasi</p>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title mb-3">{{ $totalMasyarat}}</h5>
        <p class="card-text">Masyarakat</p>
      </div>
    </div>
  </div>
</div>
@endsection