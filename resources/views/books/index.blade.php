@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  @forelse($books as $book)

  <div class="card my-4">
    <div class="card-body text-center">
      <h5 class="card-title">{{ $book->title }}</h5>
      <p class="card-text">{{ $book->author }}</p>
      <p class="card-text">{{ $book->type }}</p>
      <p class="card-text">{{ $book->description }}</p>
      <a class="btn btn-primary" href="{{route('books.show', $book)}}">Dettagli</a>
      <a class="btn btn-warning" href="{{route('books.edit', $book)}}">Modifica</a>
      <form action="{{route('books.destroy',$book)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="trash">
          <i class="fa-solid fa-trash text-danger"></i>

        </button>

      </form>
    </div>
  </div>
</section>
@empty
<h2>Non ci sono risultati</h2>
@endforelse
</section>
@endsection