<!-- resources/views/books/genre.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Books in Genre: {{ $genre }}</h2>

        <div class="row">
            @if (isset($booksByGenre) && count($booksByGenre) > 0)
                @foreach ($booksByGenre as $book)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/book_placeholder.jpg') }}" class="card-img-top" alt="{{ $book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">{{ $book->description }}</p>
                                <a href="#" class="btn btn-primary">Rent Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No books available in this genre.</p>
            @endif
        </div>
    </div>
@endsection
