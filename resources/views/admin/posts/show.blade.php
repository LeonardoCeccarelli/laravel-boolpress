@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Titolo: {{ $post->title }}</h1>

        @if ($post->subtitle)
            <h2>Sottotitolo: {{ $post->subtitle }}</h2>
        @endif

        <p>Contenuto: <br>
            {!! $post->content !!}
        </p>

        <h4>Categoria: {{ $post->category->name }}</h3>

        <h4 class="mb-4">Autore: {{ $post->user->name }}</h3>
        
        <div class="d-flex">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success">Modifica</a>

            <form action="{{ route('admin.posts.destroy', $post->id) }}"
                method="post" class="ml-3">

                @csrf
                @method("delete")

                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </div>
    </div>
@endsection