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
            <h1>Pending Requests</h1>

            @if ($pendingRequests->isEmpty())
                <p>No pending requests at the moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th>Student</th>
                            <th>Phone Number</th>
                            <th>Payment Method</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingRequests as $request)
                            <tr>
                                <td>{{ $request->book->title }}</td>
                                <td>{{ $request->user->first_name }}, {{ $request->user->last_name }}</td>
                                <td>{{ $request->user->phone_number }}</td>
                                <td>{{ $request->payment_method }}</td>
                                <td>
                                    <form action="{{ route('approve-request', ['rent' => $request->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>

                                    <form action="{{ route('decline-request', ['rent' => $request->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <style>
        .custom-bg-color {
            background-color: #e1dcc5;
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
    </style>

    <!-- Bootstrap JS (required for modal functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
