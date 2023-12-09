<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333333;">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/tada.png') }}"style="width: 25px; height: 25px;"> RentAklat
    </a>

    <!-- Add a button to toggle the navigation bar on small screens -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <!-- Add your navigation links here -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('legal') }}">LEGAL POLICIES AND SECURITY</a>
            </li>
            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">LOGIN</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
            @else
            @endguest
        </ul>
    </div>
</nav>
