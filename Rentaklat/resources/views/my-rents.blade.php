<!-- my-rents.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="custom-bg-color">
    @include("navigation bar/topnavbarLoggedin")
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
                <h1>My Rents</h1>

                @if ($rents->isEmpty())
                <p>You have not rented any books yet.</p>
                @else
                @foreach ($rents as $rent)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            @if ($rent->book->image)
                            <img src="{{ asset('storage/images/' . $rent->book->image) }}" class="card-img-top"
                                alt="{{ $rent->book->title }}">
                            @else
                            <img src="{{ asset('images/Imagesample.png') }}" class="card-img-top"
                                alt="{{ $rent->book->title }}">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $rent->book->title }}</h5>
                                <p class="card-text">{{ $rent->book->description }}</p>
                                <p class="card-text"><strong>Owner:</strong> {{
                                    $rent->book->owner ? $rent->book->owner->last_name . ', ' . $rent->book->owner->first_name : 'No Owner' }}
                                </p>
                                <p class="card-text"><strong>Rented At:</strong>
                                    {{ $rent->created_at ? $rent->created_at->format('F d, Y H:i:s') : 'N/A' }}
                                </p>
                                <p class="card-text"><strong>Expected Maximum Return Period:</strong>
                                    in 2 months
                                </p>
                                <p><i>*additional fees will be applied once not returned at expected period of time</i></p>
                                <p class="card-text"><strong>Status:</strong> {{ $rent->status }}</p>
                                @if ($rent->status === 'returned')
                                <p class="card-text"><strong>Returned At:</strong>
                                    {{ $rent->updated_at->format('F d, Y H:i:s') }}</p>
                                @elseif ($rent->status === 'pending')
                                <p class="card-text">This book is pending. You can cancel the request.</p>
                                <form action="{{ route('cancel-rent', ['rent' => $rent->id]) }}" method="post">
                                    @csrf
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#cancelModal{{ $rent->id }}">Cancel Request</button>
                                    <!-- ... (cancel modal code) ... -->
                                    <div class="modal fade" id="cancelModal{{ $rent->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="cancelModalLabel">Cancel
                                                        Request</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to cancel the rental request for
                                                    "{{ $rent->book->title }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-warning">Yes,
                                                        Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @elseif ($rent->status === 'approved')
                                <form action="{{ route('return-book', ['rent' => $rent->id]) }}" method="post">
                                    @csrf
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#returnModal{{ $rent->id }}">Return Book</button>
                                    <!-- ... (return modal code) ... -->
                                    <div class="modal fade" id="returnModal{{ $rent->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="returnModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="returnModalLabel">Return Book</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to return the book "{{ $rent->book->title }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes, Return</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
            color: #007bff;
            /* Blue color for link */
            text-decoration: none;
        }

        .login-text:hover {
            text-decoration: underline;
        }
        .btn-primary {
    background-color: #943b00;
    border: 1px solid #943b00;
    transition: background-color 0.3s ease, border 0.3s ease; /* Smooth transition for background and border */
    }

    .btn-primary:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(255, 165, 0, 0.5);
        background-color: #b66025; 
        border: 1px solid #943b00;
    }

    html body .btn-primary:active {
        background-color: #b66025 !important; 
        border-color: #943b00 !important;
        color: #fff !important;
        box-shadow: none !important; 
    }

    html body .btn-primary:active:focus {
        outline: none !important;
        box-shadow: 0 0 0 2px rgba(255, 165, 0, 0.5) !important; 
    }

        .btn-primary:hover {
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
