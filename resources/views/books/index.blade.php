@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  @forelse($books as $book)
    <p>
      <strong>Name</strong>: {{ $book->name }} <br>
      <strong>Author</strong>: {{ $book->author }} <br>
      <strong>Genere</strong>: {{ $book->type }}
      <strong>Description</strong>: {{ $book->description }} <br>

      <form action="{{route('books.destroy',$book)}}" method="POST">
        @csrf
        @method('DELETE')
<button class="trash">
<i class="fa-solid fa-trash text-danger"></i>

</button>

    </form>
    </p>
    <hr>
  @empty
    <h2>Non ci sono risultati</h2>
  @endforelse
</section>
@endsection