@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
   <a href="{{route('books.index')}}" class="btn btn-success mb-2">Torna indietro</a> 

  <h1 class="my-5">Crea Libro</h1>
  
 <form action="{{ route('books.update', $book) }}" method="POST" class="row g-3" > 
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
      <label for="type" class="form-label">Type</label>
      <select id="type" name="type" class="form-select">
        <option value="sci-fi">sci_fi</option>
        <option value="horror">horror</option>
        <option value="fantasy">fantasy</option>
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