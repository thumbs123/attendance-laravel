@extends('dashboard.layout.main')

@section('container')

<h1 class="mb-5">{{ $friend->name }}</h1>
    
<p>By. <a href="/author/{{ $friend->user->name }}" class="text-decoration-none">{{ $friend->user->name }}</a> <a href="/categories/{{ $post->category->slug}}" class="text-decoration-none">{{ $post->category->name }}</a></p>

{!! $post ->body !!}

<a href="/posts" class="d-block mt-3">Back to Post</a>

@endsection