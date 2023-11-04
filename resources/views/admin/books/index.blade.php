@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1 class="text-center">{{$title}}</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Crea il tuo libro!</a>
    @foreach ($books as $book)
    <div class="card my-4 h-100">
      <div class="card-body text-center">
        <h5 class="card-title"><strong>Titolo:</strong> {{ $book->name }}</h5>
        <p class="card-text"><strong>Genere:</strong> {{ $book->genre->name }}</p>
        <p><strong>Tags: </strong>{!!$book->getTagBadges()!!}</p>
        {{-- <p class="card-text"><strong>Genere:</strong> {{ $book->getGenre() }}</p> --}}
        <p class="card-text"><strong>Autore:</strong> {{ $book->author }}</p>
        {{-- <p class="card-text">{{ $book->type }}</p> --}}
        <p class="card-text"><strong>Descrizione:</strong> {{ $book->description }}</p>
        <a class="btn btn-primary" href="{{route('admin.books.show', $book)}}">Dettagli</a>
        <a class="btn btn-warning" href="{{route('admin.books.edit', $book)}}">Modifica</a>
        @include('partials._modal')
      </div>
    </div>
    @endforeach
  </section>
@endsection