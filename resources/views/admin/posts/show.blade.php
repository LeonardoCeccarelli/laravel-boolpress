@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div>
        <h1 class="admin_show_item">
            <small class="text-secondary mr-5">Titolo:</small>
            {{ $post->title }}
        </h1>
        @if ($post->subtitle)
        <h2 class="admin_show_item">
            <small class="text-secondary mr-5">Sottotitolo:</small>
            {{ $post->subtitle }}
        </h2>
        @endif
    </div> --}}
    {{-- <p>&leftarrow;</p> --}}
    <h1>Titolo: {{ $post->title }}</h1>

    @if ($post->subtitle)
    <h2>Sottotitolo: {{ $post->subtitle }}</h2>
    @endif

    <p>Contenuto: <br>
        {!! $post->content !!}
    </p>

    <h4>Categoria: {{ $post->category->name }}</h4>

    @if ($post->tags->count())
    <h4>Tags:
        @foreach ($post->tags as $tag)
        <h6 class="d-inline-block"><span class="badge badge-secondary">{{ $tag->name }}</span></h6>
        @endforeach
    </h4>
    @endif



    <h4 class="mb-4">Autore: {{ $post->user->name }}</h4>

    <div class="d-flex">
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success text-light">Modifica</a>

        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="ms-3">

            @csrf
            @method("delete")

            <button type="submit" class="btn btn-danger text-light">Elimina</button>
        </form>
    </div>
</div>
@endsection