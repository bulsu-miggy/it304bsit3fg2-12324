<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="custom-bg-color">
    @include('navigation bar/topnavbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-bg-color {
            background-color: #560000;
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
</body>
</html>
