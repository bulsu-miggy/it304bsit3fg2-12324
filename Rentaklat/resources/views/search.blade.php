<!-- resources/views/search.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="custom-bg-color">
    @if (Auth::check())
        @include("navigation bar/topnavbarLoggedin")
    @else
        @include("navigation bar/topnavbar")
    @endif

    <div class="container mt-5">
        <div class="d-flex mb-3 justify-content-between align-items-center">
            <div>
                <h1>RentAklat</h1>
            </div>
            <div class="d-flex align-items-center">
                <span class="mr-2" style="font-size: 18px;">Browse</span>
                <form action="{{ route('search') }}" method="GET" class="form-inline">
                    <input type="text" name="title" class="form-control mr-2" placeholder="Search">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <h1>Search Results for "{{ $title }}"</h1>

        <div class="row">
            @forelse ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($book->image)
                            <img src="{{ asset('storage/images/' . $book->image) }}" class="card-img-top img-fluid" alt="{{ $book->title }}">
                        @else
                            <img src="{{ asset('images/Imagesample.png') }}" class="card-img-top img-fluid" alt="{{ $book->title }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Owner: {{ $book->owner ? $book->owner->last_name . ', ' . $book->owner->first_name : 'No Owner' }}</p>       
                                <button type="button" class="btn btn-primary mt-auto" data-toggle="modal" data-target="#rentModal{{ $book->id }}">
                                    RENT
                                </button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="rentModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="rentModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rentModalLabel">Rent</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @auth
                                    <p>Are you sure you want to rent "{{ $book->title }}"?</p>
                                    @if (!Auth::user()->phone_number || !Auth::user()->address)
                                        <div class="alert alert-warning">
                                            <p>Please fill in your phone number and address before renting a book.</p>
                                        </div>
                                    @endif
                                @else
                                    <p>Please <a href="{{ route('login') }}">log in</a> to rent this book.</p>
                                @endauth
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                @auth
                                    @if (Auth::user()->phone_number && Auth::user()->address)
                                        <form action="{{ route('payment-confirmation', ['book' => $book->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Rent</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p>No results found.</p>
            @endforelse
        </div>
    </div>

    <style>
        .custom-bg-color {
            background-color: #e1dcc5;
        }
    </style>

    <!-- Bootstrap JS (required for modal functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
