@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
    <div class="card my-4">
        <div class="card-body text-center">
            <h5 class="card-title">Titolo: {{ $book->name }}</h5>
            <p class="card-text">{{ $book->genre->name }}</p>
            <p class="card-text"><strong>Autore:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Descrizione:</strong> {{ $book->description }}</p>
            <a class="btn btn-primary" href="{{route('admin.books.index')}}">Torna alla home page</a>
            <a class="btn btn-warning" href="{{route('admin.books.edit', $book)}}">Modifica</a>

        </div>
    </div>
</section>
@endsection