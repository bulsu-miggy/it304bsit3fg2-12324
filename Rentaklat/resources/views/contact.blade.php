<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Contact us</title>
</head>
<body class="custom-bg-color">
    @if (Auth::check())
        @include("navigation bar/topnavbarLoggedin")
    @else
        @include("navigation bar/topnavbar")
    @endif
    <div class="container p-4 border rounded bg-white mt-5">
        <h1>Contact RentAklat</h1>

        <p>Feel free to connect with RentAklat through the following channels:</p>

        <ul>
            <li><strong>Facebook:</strong> <a href="[Your Facebook Page URL]" target="_blank">RentAklat Facebook</a></li>
            <li><strong>Instagram:</strong> <a href="[Your Instagram Page URL]" target="_blank">RentAklat Instagram</a></li>
            <li><strong>Email:</strong> <a href="mailto:[Your Email Address]">RentAklat Email</a></li>
        </ul>
    </div>
    <style>
        .custom-bg-color {
            background-color: #e1dcc5;
            height: 100vh;
        }

    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
