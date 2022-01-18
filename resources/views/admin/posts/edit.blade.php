@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="d-flex align-items-center flex-column mb-5">
            @csrf

            @method("put")
    
            <div class="mb-4 w-75">
                <label for="field_title" class="form-label">Titolo</label>
                <input type="text" class="form-control {{ $errors->has("title") ? 'is-invalid' : '' }}" 
                 name="title" id="field_title"
                 value="{{ old("title") }}">
    
                @if($errors->has("title"))
                <div class="invalid-feedback">
                    {{ $errors->get("title")[0]}}
                </div>
                @endif
            </div>
    
            <div class="mb-4 w-75">
                <label for="field_subtitle" class="form-label">Sottotitolo</label>
                <input type="text" class="form-control {{ $errors->has("subtitle") ? 'is-invalid' : '' }}" 
                 name="subtitle" id="field_subtitle"
                 value="{{ old("subtitle") }}">
    
                @if($errors->has("subtitle"))
                <div class="invalid-feedback">
                    {{ $errors->get("subtitle")[0]}}
                </div>
                @endif
            </div>

            <div class="mb-4 w-75">
                <label for="field_content" class="form-label">Contenuto</label>
                <input type="text"  class="form-control {{ $errors->has("content") ? 'is-invalid' : '' }}" 
                 name="content" id="field_content"
                 value="{{ old("content") }}">
    
                @if($errors->has("content"))
                <div class="invalid-feedback">
                    {{ $errors->get("content")[0]}}
                </div>
                @endif
            </div>

            <div class="mb-4 w-75">
                <label for="field_author" class="form-label">Autore</label>
                <input type="text" class="form-control" 
                 name="author" id="field_author"
                 value="{{ Auth::user()->name }}" readonly>
            </div>
    
            <div class="mb-4 w-75">
                <label for="field_coverImg" class="form-label">Link Immagine</label>
                <input type="text" class="form-control {{ $errors->has("coverImg") ? 'is-invalid' : '' }}" 
                 name="coverImg" id="field_coverImg"
                 value="{{ old("coverImg") }}">
    
                @if($errors->has("coverImg"))
                <div class="invalid-feedback">
                    {{ $errors->get("coverImg")[0]}}
                </div>
                @endif
            </div>

            <div class="mb-4 w-75">
                <label for="field_category" class="form-label">Categoria</label>
                <input type="text" class="form-control {{ $errors->has("category") ? 'is-invalid' : '' }}" 
                 name="category" id="field_category"
                 value="{{ old("category") }}">
    
                @if($errors->has("category"))
                <div class="invalid-feedback">
                    {{ $errors->get("category")[0]}}
                </div>
                @endif
            </div>

            <div>
                <button type="submit" class="btn btn-success">Modifica</button>
                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-outline-secondary">Annulla</a>
            </div>
    
        </form>
    </div>
@endsection