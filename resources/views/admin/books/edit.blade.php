@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
  <a href="{{route('admin.books.index')}}" class="btn btn-success mb-2">Torna indietro</a>

  <h1 class="my-5">Modifica Libro</h1>

  <form action="{{ route('admin.books.update', $book) }}" method="POST" class="row g-3" enctype="multipart/form-data">
    @csrf

    @method('PUT')


    <div class="col-3">
      <label for="name" class="form-label">Titolo</label>
      <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name') ?? $book->name}}">
      @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror"
        value="{{ old('author') ?? $book->author}}">
      @error('author')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-3">
      <label for="genre_id" class="form-label">Genere</label>
      <select id="genre_id" name="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
        @foreach ($genres as $genre)
        <option value="{{$genre->id}}" @if (old('genre_id') ?? $book->genre_id == $genre->id) selected
          @endif>{{$genre->name}}</option>
        @endforeach
      </select>
      @error('genre_id')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-3">
      <label for="ISBN" class="form-label">ISBN</label>
      <input type="text" id="ISBN" name="ISBN" class="form-control @error('ISBN') is-invalid @enderror"
        value="{{ old('ISBN') ?? $book->ISBN}}">
      @error('ISBN')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>


    <div class="row my-4">

      <div class="col-6">
        <div class="input-group">
          <input type="file" name="book_cover" id="book_cover" value="{{old('book_cover')}}"
            class="form-control @error('book_cover') is-invalid @enderror">
          <label class="input-group-text" for="book_cover">Upload</label>
        </div>
        @error('book_cover')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="col-6">
        <img src="{{asset('/storage/'. $book->book_cover)}}" alt="" class="img-fluid" id="preview-image">
      </div>

    </div>

    <div class="col-12">
      <label class="form-label"><strong>Tags</strong></label>
      <div class="form-check row row-cols-2 row-cols-lg-4 d-flex g-2 p-0 @error('tags') is-invalid @enderror">
        @foreach ($tags as $tag)
        <div class="col">
          <input type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
            class="form-check-control @error('tags') is-invalid @enderror" @if (in_array($tag->id, old('tags',
          $book_tag)))
          checked
          @endif
          >
          <label for="tag-{{ $tag->id }}">
            {{ $tag->label }}
          </label>
        </div>
        @endforeach
        @error('tags')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="col-12">
      <label for="description" class="form-label">Description</label>
      <input type="text" id="description" name="description"
        class="form-control @error('description') is-invalid @enderror"
        value="{{ old('description') ?? $book->description}}">
      @error('description')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-3">
      <button class="btn btn-primary">Salva</button>
    </div>

  </form>
</div>


@endsection

@section('scripts')
<script>
    const previewImg = document.getElementById('preview-image');
    const inputFile = document.getElementById('book_cover');

    if (!previewImg.getAttribute('src') || previewImg.getAttribute('src') == "http://127.0.0.1:8000/storage" ){
        previewImg.src = "https://picsum.photos/200"
    }

    inputFile.addEventListener('change', function() {
        const [file] = this.files
        previewImg.src= URL.createObjectURL(file);
    })

</script>
@endsection