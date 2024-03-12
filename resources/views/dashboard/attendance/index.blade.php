@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Contact </h1>
  </div>
  <div class="table-responsive col-lg-8">
    <a href="/dashboard/attendance/create" class="btn btn-primary mb-3"><span data-feather="plus"></span>Tambah data</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Nomor Handphone</th>
          <th scope="col">Email</th>
          <th scope="col">Sosial</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($friends as $friend) 
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $friend->name }}</td>
          <td>{{ $friend->nomor }}</td>
          <td>{{ $friend->email }}</td>
          <td>{{ $friend->sosial }}</td>
          <td>
            <a href="/dashboard/attendance/{{ $friend->id }}/edit" class="badge btn-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/attendance/{{ $friend->id }}" class="d-inline" method="POST">
              @method('delete')
              @csrf
              <button class="badge btn-danger border-0" onclick="return confirm('Ingin Menghapus Data')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection