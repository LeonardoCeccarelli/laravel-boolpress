@extends('layouts.app')

@section('content')
    @if (count($posts) === 0)
        <h2 class="text-center">Nessun risultato</h2>
    @else
        <div class="container">
            <div class="row row-cols-2">
                @foreach ($posts as $post)
                    <div class="col py-3">
                        <div class="card">
                            <img src="" class="card-img-top" alt="post_image">
                            <div class="card-body">
                              <h5 class="card-title">{{ $post->title }}</h5>
                              <p class="card-text">{{ $post->content }}</p>
                              <a href="{{ route("admin.posts.show", $post->id) }}" class="btn btn-sm btn-primary">Info</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection