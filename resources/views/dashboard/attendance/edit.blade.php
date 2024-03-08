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
  <form method="POST" action="{{ route('attendance.update',$friend->id) }}">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $friend->name }}">
    </div>
    <div class="mb-3">
      <label for="nomor" class="form-label">Nomor</label>
      <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $friend->nomor }}">
    </div>
    <div class="mb-3">
      <label for="sosial" class="form-label">Sosmed</label>
      <input type="text" class="form-control" id="sosial" name="sosial" value="{{ $friend->sosial }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection