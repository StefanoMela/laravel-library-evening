@extends('layouts.app')
@section('main-content')
<section class="container text-center my-4">
    <h1 class="mb-4">{{ $title }}</h1>
    <h3>Featured Books</h3>
    <h6>Effettua il <a href="{{route('login')}}">login</a> per vedere tutti i libri</h6>
    @if(isset($books))
        @foreach ($books as $book)
        <div class="card my-4">
            <div class="card-body text-center">
                <h5 class="card-title">Titolo: {{ $book->name }}</h5>
                <p class="card-text">{{ $book->genre?->name }}</p>
                <p class="card-text"><strong>Autore:</strong> {{ $book->author }}</p>
                <p class="card-text"><strong>Descrizione:</strong> {{ $book->description }}</p>    
            </div>
        </div>
        @endforeach
        @else
        <h6>Non ci sono libri da consigliare</h6>
    @endif
</section>
@endsection