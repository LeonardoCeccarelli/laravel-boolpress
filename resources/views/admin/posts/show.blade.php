@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <h2>{{ $post->subtitle }}</h2>
        <p>{{ $post->content }}</p>
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success">Modifica</a>
        <a href="#" class="btn btn-danger">Elimina</a>
    </div>
@endsection