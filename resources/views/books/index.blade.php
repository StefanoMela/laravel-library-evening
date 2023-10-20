@extends('layouts.app')

@section('main-content')
<section class="container mt-5">

  @forelse($books as $book)
    <p>
      <strong>Name</strong>: {{ $book->name }} <br>
      <strong>Author</strong>: {{ $book->author }} <br>
      <strong>Genere</strong>: {{ $book->type }}
      <strong>Description</strong>: {{ $book->description }} <br>

    </p>
    <hr>
  @empty
    <h2>Non ci sono risultati</h2>
  @endforelse
</section>
@endsection