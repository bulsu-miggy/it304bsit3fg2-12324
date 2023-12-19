<!-- resources/views/legal.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Legal and Security</title>
</head>
<body class="custom-bg-color">
    @if (Auth::check())
        @include("navigation bar/topnavbarLoggedin")
    @else
        @include("navigation bar/topnavbar")
    @endif

    <div class="container p-4 border rounded bg-white mt-5">
        <h1 class="">Legal and Security</h1>

        <section id="terms-of-service" class="animate__animated animate__fadeIn">
            <h2>Terms of Service</h2>
            <p>
                Welcome to Rentaklat! By using our platform, you agree to comply with and be bound by the following terms and conditions. Please read these carefully.
            </p>
          
        </section>

        <section id="privacy-policy" class="animate__animated animate__fadeIn">
            <h2>Privacy Policy</h2>
            <p>
                Your privacy is important to us. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our services.
            </p>
           
        </section>

        <section id="copyright-and-intellectual-property" class="animate__animated animate__fadeIn">
            <h2>Copyright and Intellectual Property</h2>
            <p>
                All content on Rentaklat is the property of Rentaklat or its content suppliers and is protected by copyright laws.
            </p>
            
        </section>

        <section id="user-agreement" class="animate__animated animate__fadeIn">
            <h2>User Agreement</h2>
            <p>
                By using Rentaklat, you agree to abide by our User Agreement, which outlines the rules and guidelines for using our platform and interacting with other users.
            </p>
            
        </section>

        <section id="renting-and-returning-policies" class="animate__animated animate__fadeIn">
            <h2>Renting and Returning Policies</h2>
            <p>
                Our policies for renting and returning books are designed to provide a smooth experience for our users. Please review these policies before using our rental services.
            </p>
            
        </section>

        <section id="security-measures" class="animate__animated animate__fadeIn">
            <h2>Security Measures</h2>
            <p>
                At Rentaklat, we take the security of your data seriously. Here are the security measures we have implemented to protect your information.
            </p>
            <ul>
                <li>Encryption: We use industry-standard encryption protocols to secure your data during transmission.</li>
                <li>Secure Storage: Your information is stored securely on our servers with restricted access.</li>
                <li>Regular Audits: We conduct regular security audits to identify and address potential vulnerabilities.</li>
                <li>Two-Factor Authentication: Enhance your account security with two-factor authentication.</li>
            </ul>
        </section>
    </div>

    <style>
        .custom-bg-color {
            background-color: #560000;
        }
        h1{
            text-align: center;
        }

    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
