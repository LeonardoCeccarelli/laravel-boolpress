@extends('layouts.app')

@section('content')
@if (count($posts) === 0)
<h2 class="text-center">Nessun risultato</h2>
@else
<div class="container">
    <div class="row row-cols-1">
        @foreach ($posts as $post)
        <div class="col py-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h4>{{ mb_strimwidth($post->title, 0, 50, "...") }}</h4>
                        <h6 class="mb-0">
                            {{ $post->user->name }} <small class="text-secondary">- {{ $post->created_at }}</small>
                        </h6>
                    </div>
                    <div>
                        <a href="{{ route('admin.posts.show', $post->id) }}" role="button"
                            class="btn btn-sm btn-primary btn_hover text-light">Info</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection