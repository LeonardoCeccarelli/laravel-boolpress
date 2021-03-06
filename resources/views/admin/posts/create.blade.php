@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="POST"
        class="d-flex align-items-center flex-column mb-5">
        @csrf

        <div class="mb-4 w-75">
            <label for="field_title" class="form-label">Titolo</label>
            <input type="text" class="form-control {{ $errors->has(" title") ? 'is-invalid' : '' }}" name="title"
                id="field_title" value="{{ old(" title") }}">

            @if($errors->has("title"))
            <div class="invalid-feedback">
                {{ $errors->get("title")[0]}}
            </div>
            @endif
        </div>

        <div class="mb-4 w-75">
            <label for="field_subtitle" class="form-label">Sottotitolo</label>
            <input type="text" class="form-control {{ $errors->has(" subtitle") ? 'is-invalid' : '' }}" name="subtitle"
                id="field_subtitle" value="{{ old(" subtitle") }}">

            @if($errors->has("subtitle"))
            <div class="invalid-feedback">
                {{ $errors->get("subtitle")[0]}}
            </div>
            @endif
        </div>

        <div class="mb-4 w-75">
            <label class="form-label">Contenuto</label>
            <textarea type="text" rows="5" class="form-control {{ $errors->has(" content") ? 'is-invalid' : '' }}"
                name="content">{{ old("content") }}</textarea>

            @if($errors->has("content"))
            <div class="invalid-feedback">
                {{ $errors->get("content")[0]}}
            </div>
            @endif
        </div>

        <div class="mb-4 w-75">
            <label for="field_coverImg" class="form-label">Link Immagine</label>
            <input type="file" class="form-control {{ $errors->has(" coverImg") ? 'is-invalid' : '' }}" name="coverImg"
                id="field_coverImg" value="{{ old(" coverImg") }}">

            @if($errors->has("coverImg"))
            <div class="invalid-feedback">
                {{ $errors->get("coverImg")[0]}}
            </div>
            @endif
        </div>

        <div class="d-flex justify-content-between w-75 mb-4">

            <div>
                <div class="form-group">
                    <label for="field_category_id" class="form-label">Categoria</label>
                    <select name="category_id" class="form-control" id="field_category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label for="field_tags" class="form-label">Tags</label>
                    <small class="text-secondary mb-0 ml-3 pt-1 d-inline-block">Hold down the Ctrl (windows) or Command
                        (Mac) button to select multiple options.</small>
                    <select name="tags[]" class="form-control" multiple id="field_tags">
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}">
                            {{$tag->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="mb-4 w-75">
            <label for="field_author" class="form-label">Autore</label>
            <input type="text" class="form-control" id="field_author" value="{{ Auth::user()->name }}" readonly>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </div>

    </form>
</div>

<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
@endsection