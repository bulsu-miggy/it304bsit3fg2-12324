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
        <!-- Heading and Search Bar -->
        <div class="d-flex mb-3 justify-content-between align-items-center">
            <div><h1></h1></div>
            <div class="d-flex align-items-center">
                <span class="mr-2" style="font-size: 18px;">Browse</span>
                <form action="{{ route('search') }}" method="GET" class="form-inline">
                    <input type="text" name="title" class="form-control mr-2" placeholder="Search">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        
        <div class="row1">
            <!-- Image Box -->
            <div class="col-md-6">
                <img class="image" src="http://127.0.0.1:8000/images/Rentaklat-logo.png" alt="Logo"> 
            </div>
            <!-- Welcome Message -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="welcome text-center">
                    <h2>Welcome to RentAklat</h2>
                    <p class="quote">Uniting Students, Sharing Knowledge</p>
                </div>
            </div>
        </div>
        <!-- Featured Books Section -->
        <h2>Featured Books</h2>
        <div class="row">
            @foreach ($featuredBooks as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($book->image)
                            <img src="{{ asset('storage/images/' . $book->image) }}" class="card-img-top img-fluid" alt="{{ $book->title }}"> <!-- Added 'img-fluid' -->
                        @else
                            <img src="{{ asset('images/Imagesample.png') }}" class="card-img-top img-fluid" alt="{{ $book->title }}"> <!-- Added 'img-fluid' -->
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
                <!-- Modal in Welcome Page -->
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

            @endforeach
        </div>

        @foreach ($genres as $genre)
            @if(isset($booksByGenre[$genre]))
                <h2>{{ $genre }}</h2>
                <div class="row">
                    @foreach ($booksByGenre[$genre] as $book)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if ($book->image)
                                    <img src="{{ asset('storage/images/' . $book->image) }}" class="card-img-top img-fluid" alt="{{ $book->title }}"> <!-- Added 'img-fluid' -->
                                @else
                                    <img src="{{ asset('images/Imagesample.png') }}" class="card-img-top img-fluid" alt="{{ $book->title }}"> <!-- Added 'img-fluid' -->
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
                        <!-- Modal in Welcome Page -->
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

                    @endforeach
                </div>
            @endif
        @endforeach
    </div>

    <!-- Styles -->
    <style>
          .custom-bg-color {
            background-color: #560000;
        }
        .row1{
            height: 80vh;
            display: flex;
       
        }
        h2{
            color: #f9f9f9;
        }
        .quote{
            color: #f5b879;
            font-size: 25px;
        }

        .row{
            height:100%;
        }
        .image {
            max-width: 100%;
            height: auto;
        }
        .welcome h2 {
            font-size: 3rem; 
        }
        .mr-2{
            color: #f9f9f9;
        }
        .btn {
            background-color: #943b00;
            border: 1px solid #943b00;
            transition: background-color 0.3s ease, border 0.3s ease; /* Smooth transition for background and border */
        }

        .btn:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 165, 0, 0.5);
            background-color: #b66025; 
            border: 1px solid #943b00;
        }

        html body .btn:active {
            background-color: #b66025 !important; 
            border-color: #943b00 !important;
            color: #fff !important;
            box-shadow: none !important; 
        }

        html body .btn:active:focus {
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(255, 165, 0, 0.5) !important; 
        }

        .btn:hover {
            background-color: #b66025; 
            border: 1px solid #943b00;
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
