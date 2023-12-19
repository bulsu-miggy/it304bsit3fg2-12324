<!-- my-listings.blade.php -->

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
    <div class="container text-center p-4 border rounded bg-white mt-5">
        <div class="text-left">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container">
                <h1>My Listings</h1>
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createBookModal">
                        Add Book
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="createBookModal" tabindex="-1" role="dialog" aria-labelledby="createBookModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createBookModalLabel">Create a New Book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <label for="title">Title:</label>
                                        <input type="text" name="title" class="form-control mb-3" required>

                                        <label for="description">Description:</label>
                                        <textarea name="description" class="form-control mb-3" required></textarea>

                                        <label for="genre">Genre:</label>
                                        <input type="text" name="genre" class="form-control mb-3" required>

                                        
                                        <label for="image">Book Image:</label>
                                        <input type="file" name="image" class="form-control mb-3" accept="image/*">

                                                                    
                                        <label for="payment_method">Select Payment Method:</label>
                        <select name="payment_method" id="payment_method" class="form-control mb-3">
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="paymaya">Paymaya</option>
                            <option value="gcash">G-Cash</option>
                            <option value="gcash">Cash</option>
                            <!-- Add more payment options as needed -->
                        </select>
                                        <button type="submit" class="btn btn-primary mb">Pay Fee to List</button>
                                        <p class="deduction">3% will be deducted</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @if ($books->isEmpty())
                    <p>You have not listed any books yet.</p>
                @else
                    @foreach ($books as $book)
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <!-- Check if the book has an image -->
                                    @if ($book->image)
                                        <!-- Use asset() to generate the correct URL for the image -->
                                        <img src="{{ asset('storage/images/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                                    @else
                                        <!-- If no image is available, you can use a placeholder or leave it blank -->
                                        <img src="{{ asset('images/Imagesample.png') }}" class="card-img-top" alt="{{ $book->title }}">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                        <p class="card-text">{{ $book->description }}</p>
                                        <p class="card-text"><strong>Created At:</strong> {{ $book->created_at->format('F d, Y H:i:s') }}</p>
                                        <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#rentorsModal{{ $book->id }}">
                                            List Rentors
                                        </button>
                                        <!-- Add remove button with form -->
                                        <div class="text-right">
                                            <form action="{{ route('books.remove', $book->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="rentorsModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="rentorsModalLabel{{ $book->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rentorsModalLabel{{ $book->id }}">Rentors of {{ $book->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Display the list of rentors here -->
                                        @if ($book->renters->isEmpty())
                                            <p>No students have rented this book yet.</p>
                                        @else
                                            <ol>
                                                @foreach ($book->renters as $renter)
                                                    <li>{{ $renter->first_name }} {{ $renter->last_name }}</li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <style>
        .custom-bg-color {
            background-color: #560000;
        }

        .login-text {
            cursor: pointer;
            color: #007bff; /* Blue color for link */
            text-decoration: none;
        }

        .login-text:hover {
            text-decoration: underline;
        }

        .deduction {
           margin-left: 20px;
           display: inline;
           opacity: 60%;
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

    <!-- Bootstrap JS (required for modal functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>