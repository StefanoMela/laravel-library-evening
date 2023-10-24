@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1 class="text-center">{{$title}}</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Crea il tuo libro!</a>
    @foreach ($books as $book)
    <div class="card my-4 h-100">
      <div class="card-body text-center">
        <h5 class="card-title">{{ $book->title }}</h5>
        <p class="card-text">{{ $book->author }}</p>
        <p class="card-text">{{ $book->type }}</p>
        <p class="card-text">{{ $book->description }}</p>
        <a class="btn btn-primary" href="{{route('admin.books.show', $book)}}">Dettagli</a>
        <a class="btn btn-warning" href="{{route('admin.books.edit', $book)}}">Modifica</a>
        @include('partials._modal')
      </div>
    </div>
    @endforeach
  </section>
@endsection