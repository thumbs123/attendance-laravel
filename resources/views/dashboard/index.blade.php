@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="h4">Selamat Datang {{ auth()->user()->name }}, {{ $quotes }}</h3>
</div>
@endsection
