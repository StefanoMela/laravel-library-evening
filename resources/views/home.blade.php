@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>{{ $title }}</h1>
    <a href="{{route('admin.books.index')}}" class="btn btn-primary">Vai ai libri</a>
  </section>
@endsection
