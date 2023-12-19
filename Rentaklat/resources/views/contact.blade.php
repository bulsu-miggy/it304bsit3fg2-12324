<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

        <div class="cont">
            <li><div><i class='bx bxl-facebook-circle'></i></div>
            <a href="[Your Facebook Page URL]" target="_blank">RentAklat Facebook</a></li>

            <li><div><i class='bx bxl-instagram' ></i></div>
             <a href="[Your Instagram Page URL]" target="_blank">RentAklat Instagram</a></li>

            <li><div><i class='bx bx-envelope' ></i></div>
             <a href="mailto:[Your Email Address]">RentAklat Email</a></li>
        </div>
    </div>
    <style>
  .custom-bg-color {
            background-color: #560000;
            height: 100vh;
        }
        h1, p{
            text-align: center;
        }
        .cont {
            display: flex;
            justify-content: space-around;
            align-items: center;
            list-style-type: none;

        }
        .icon-container {
            text-align: center;
        }
        .bx {
            font-size: 100px;
            display: block;
            margin-bottom: 10px;
        }
        li{
            justify-content: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        

        @media (max-width: 768px) {
            .cont {
                flex-direction: column;
            }
            .icon-container {
                margin-bottom: 20px;
            }
        }

    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
