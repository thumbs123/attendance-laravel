@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="h4">Selamat Datang {{ auth()->user()->name }}</h3>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    fetch('{{ route("attendance.fetchApiQuotes") }}')
        .then(response => response.json())
        .then(data => {
            if (data.code === 200) {                
                const kutipan = data.data[0]?.quote; 
                const penulis = data.data[0]?.author;
                
                Swal.fire({
                    icon: '',
                    title: 'Quote of the Day',
                    text: `${kutipan} — ${penulis}`
                });
            }
        })
</script>
@endsection
