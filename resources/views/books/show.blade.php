@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
    <div class="card my-4">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text">{{ $book->author }}</p>
            <p class="card-text">{{ $book->type }}</p>
            <p class="card-text">{{ $book->description }}</p>
            <a class="btn btn-primary" href="{{route('books.index')}}">Torna alla home page</a>
        </div>
    </div>
</section>
@endsection