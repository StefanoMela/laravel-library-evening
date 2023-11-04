@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
   <a href="{{route('admin.books.index')}}" class="btn btn-success mb-2">Torna indietro</a> 

  <h1 class="my-5">Crea Libro</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
        <h4>Correct the errors:</h4>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  
 <form action="{{ route('admin.books.store') }}" method="POST" class="row g-3" > 
  @csrf


    <div class="col-3">
      <label for="name" class="form-label"><strong>Titolo</strong></label>
      <input 
      type="text" 
      id="name" 
      name="name" 
      class="form-control @error('name') is-invalid @enderror">
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="col-3">
      <label for="author" class="form-label"><strong>Autore</strong></label>
      <input 
      type="text" 
      id="author" 
      name="author" 
      class="form-control @error('author') is-invalid @enderror">
      @error('author')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="col-3">
      <label for="genre_id" class="form-label"><strong>Genere</strong></label>
      <select 
      id="genre_id" 
      name="genre_id" 
      class="form-select @error('genre_id') is-invalid @enderror">
      @foreach ($genres as $genre)
      <option value="{{$genre->id}}" @if (old('$genre_id') == $genre->id ) selected @endif>{{$genre->name}}</option>
      @endforeach
      </select>
      @error('genre_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="col-3">
      <label for="ISBN" class="form-label"><strong>ISBN</strong></label>
      <input 
      type="text" 
      id="ISBN" 
      name="ISBN" 
      class="form-control @error('ISBN') is-invalid @enderror">
      @error('ISBN')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="col-12">                            
      <label class="form-label"><strong>Tags</strong></label>
      <div class="form-check row row-cols-2 row-cols-lg-4 d-flex g-2 p-0 @error('tags') is-invalid @enderror">                                
          @foreach ($tags as $tag)
          <div class="col">
              <input
              type="checkbox"
              id="tag-{{ $tag->id }}"
              value="{{ $tag->id }}"
              name="tags[]"
              class="form-check-control @error('tags') is-invalid @enderror"
              @if (in_array($tag->id, old('tags', $project_tag ?? [])))
              checked
              @endif
              >
              <label for="tag-{{ $tag->id }}">
                  {{ $tag->label }}
              </label>
          </div>
          @endforeach
          @error('tags')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
      </div>
  </div>

    <div class="col-12">
      <label for="description" class="form-label"><strong>Descrizione</strong></label>
      <input 
      type="text" 
      id="description" 
      name="description" 
      class="form-control @error('description') is-invalid @enderror">
      @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="col-3">
     <button class="btn btn-primary">Salva</button> 
    </div>

</form>
</div> 


@endsection 