@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add new Friend</h1>
  </div>

  @if (session()->has('succes'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>  
  @endif


  <div class="col-lg-8">
  <form method="POST" action="{{ route('attendance.store') }}">
    @csrf
    @method('post')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('nama') }}">
      @error('name')
      <div class="invalid-feedback d-block">
        {{ $message }}
      </div>
  @enderror
    </div>
    <div class="mb-3">
      <label for="nomor" class="form-label">Nomor</label>
      <input type="number" class="form-control" id="nomor" name="nomor" value="{{ old('nomor') }}">
      @error('nomor')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="{{ old('sosial') }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
    <div class="mb-3">
      <label for="sosial" class="form-label">Sosial</label>
      <input type="text" class="form-control" id="sosial" name="sosial" value="{{ old('sosial') }}">
      @error('sosial')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
    <div class="mb-3">
      <label for="user_id" class="form-label">User</label>
      <select class="form-control" id="user_id" name="user_id">
        @foreach($users as $user)
          <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
      </select>
      @error('user_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection