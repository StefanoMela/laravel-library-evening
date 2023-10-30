@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
   <a href="{{route('admin.books.index')}}" class="btn btn-success mb-2">Torna indietro</a> 

  <h1 class="my-5">Modifica Libro</h1>
  
 <form action="{{ route('admin.books.update', $book) }}" method="POST" class="row g-3" > 
  @csrf

  @method('PUT')


    <div class="col-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="col-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" id="author" name="author" class="form-control">
    </div>
    <div class="col-3">
      <label for="genre_id" class="form-label">Genere</label>
      <select id="genre_id" name="genre_id" class="form-select">
      @foreach ($genres as $genre)
      <option value="{{$genre->id}}">{{$genre->name}}</option>
      @endforeach
      </select>
    </div>
    <div class="col-3">
      <label for="ISBN" class="form-label">ISBN</label>
      <input type="text" id="ISBN" name="ISBN" class="form-control">
    </div>
    <div class="col-12">
      <label for="description" class="form-label">Description</label>
      <input type="text" id="description" name="description" class="form-control">
    </div>
    <div class="col-3">
     <button class="btn btn-primary">Salva</button> 
    </div>

</form>
</div> 


@endsection 