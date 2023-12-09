<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333333;">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/tada.png') }}" style="width: 25px; height: 25px;"> RentAklat
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('my.rents') }}">My Rents</a>
            </li>
            
            @if(auth()->user()->role === 'owner')
                <!-- Show these links only if the user is an owner -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('my-listings') }}">My Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pending-requests') }}">Pending Requests</a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('legal') }}">Legal Policies and Security</a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit();">Log Out</a>
                </form>
            </li>
        </ul>
    </div>
</nav>
