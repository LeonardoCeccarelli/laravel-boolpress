@extends('layouts.app')

@section('content')
    @if (count($posts) === 0)
        <h2 class="text-center">Nessun risultato</h2>
    @else
        <div class="container">
            <div class="row row-cols-2">
                @foreach ($posts as $post)
                    <div class="col py-3">
                        <div class="card h-100 position-relative pb-5">
                            <img src="" class="card-img-top" alt="post_image">
                            <div class="card-body mb-3">
                              <h5 class="card-title text-center text-danger text-uppercase mb-2">{{ $post->title }}</h5>

                                @if ($post->subtitle)
                                    <h5 class="card-title text-center mb-5">{{ $post->subtitle }}</h2>
                                @endif

                                <p class="card-text text-secondary">{{ mb_strimwidth(strip_tags($post->content), 0, 100, "...") }}</p>

                                <p class="card-text mb-2">Categoria: <span class="text-success">{{ $post->category->name }}</span></p>
                            
                                @if ($post->tags->count())
                                <div class="mb-5">
                                    @foreach ($post->tags as $tag)
                                    <h6 class="d-inline-block"><span class="badge badge-secondary">{{ $tag->name }}</span></h6>
                                    @endforeach
                                </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center info_section">
                                    <a href="{{ route("admin.posts.show", $post->id) }}" class="btn btn-sm btn-primary">Info</a>
                                    <p>
                                        <small>{{ $post->user->name }}</small>
                                        <br>
                                        <small>{{ $post->created_at }}</small>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection