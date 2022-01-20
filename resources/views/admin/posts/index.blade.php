@extends('layouts.app')

@section('content')
    @if (count($posts) === 0)
        <h2 class="text-center">Nessun risultato</h2>
    @else
        <div class="container">
            <div class="row row-cols-2">
                @foreach ($posts as $post)
                    <div class="col py-3 h-100">
                        <div class="card">
                            <img src="" class="card-img-top" alt="post_image">
                            <div class="card-body">
                              <h5 class="card-title text-center text-danger text-uppercase mb-2">{{ $post->title }}</h5>

                                @if ($post->subtitle)
                                    <h5 class="card-title text-center mb-5">{{ $post->subtitle }}</h2>
                                @endif

                            <p class="card-text text-secondary">{!! mb_strimwidth($post->content, 0, 100, "...") !!}</p>

                            <p class="card-text">Categoria: <span class="text-success">{{ $post->category->name }}</span></p>
                                        
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route("admin.posts.show", $post->id) }}" class="btn btn-sm btn-primary">Info</a>
                                <p><small>{{ $post->user->name }}</small></p>
                            </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection