@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new Posts</h1>
  </div>

  @if (session()->has('succes'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
  @endif


  <div class="col-lg-8">
  <form method="POST" action="{{ route('friend') }}">
    @csrf
    @method('post')
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
    <div class="mb-3">
      <label for="nomor" class="form-label">Nomor</label>
      <input type="text" class="form-control" id="nomor" name="nomor">
      @error('nomor')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
    <div class="mb-3">
      <label for="sosial" class="form-label">Sosial</label>
      <input type="text" class="form-control" id="sosial" name="sosial">
      @error('sosial')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection