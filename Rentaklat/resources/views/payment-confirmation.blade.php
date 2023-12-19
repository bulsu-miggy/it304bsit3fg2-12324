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
        <div class="card p-4">
            <h1>Rent Details</h1>

            {{-- Display rent details here --}}
            <img src="{{ asset('storage/images/' . $book->image) }}" alt="{{ $book->title }}" class="img-fluid mb-3 small-image">
            <p>Title: {{ $book->title }}</p>
            <p>Description: {{ $book->description }}</p>
            <p>Owner: {{ $book->owner ? $book->owner->last_name . ', ' . $book->owner->first_name : 'No Owner' }}</p>
            <p>Contact No. {{ $book->owner->phone_number}}</p>
            
            {{-- Display payment options --}}
            <h2 class="mt-4">Payment Options</h2>
            <form action="{{ route('confirm.rent', ['book' => $book->id]) }}" method="post">
                @csrf            
                @if (!$user->phone_number)
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" name="phone_number" pattern="[0-9]{10}" required class="form-control mb-3">
                @else
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" name="phone_number" pattern="[0-9]{10}" value="{{ $user->phone_number }}" readonly class="form-control mb-3">
                @endif
            
                <!-- Check if the user does not have an address, show the input field -->
                @if (!$user->address)
                    <label for="address">Address:</label>
                    <input type="text" name="address" required class="form-control mb-3">
                @else
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="{{ $user->address }}" readonly class="form-control mb-3">
                @endif
            
                <label for="payment_method">Select Payment Method:</label>
                <select name="payment_method" id="payment_method" class="form-control mb-3">
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="paymaya">Paymaya</option>
                    <option value="gcash">G-Cash</option>
                    <option value="gcash">Cash</option>
                    <!-- Add more payment options as needed -->
                </select>
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit" class="btn btn-primary">Request Book Now</button>
            </form>

            @if (session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
            @endif
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

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .small-image {
            max-width: 400px; /* Set your preferred maximum width */
            height: auto; /* Maintain aspect ratio */
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
