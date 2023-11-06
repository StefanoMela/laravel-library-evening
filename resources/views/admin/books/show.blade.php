@extends('layouts.app')

@section('main-content')
<section class="container mt-4">
    <div class="card my-4">
        <div class="row d-flex justify-content-center">
            <div class="col-4 my-4">
                <img src="{{asset('/storage/'. $book->book_cover)}}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="card-body text-center">
            <h5 class="card-title"><strong>Titolo:</strong> {{ $book->name }}</h5>
            <p class="card-text"><strong>Genere: </strong>{{ $book->genre->name }}</p>
            <p><strong>Tags: </strong>{!!$book->getTagBadges()!!}</p>
            <p class="card-text"><strong>Autore:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Descrizione:</strong> {{ $book->description }}</p>
            <a class="btn btn-primary" href="{{route('admin.books.index')}}">Torna alla home page</a>
            <a class="btn btn-warning" href="{{route('admin.books.edit', $book)}}">Modifica</a>
        </div>
    </div>
</section>
@endsection