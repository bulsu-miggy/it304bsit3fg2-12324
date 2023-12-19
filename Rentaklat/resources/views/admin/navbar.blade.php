<!-- resources/views/admin/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333333;">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/tada.png') }}" style="width: 25px; height: 25px;"> RentAklat
    </a>

    <!-- Add a button to toggle the navigation bar on small screens -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <!-- Add your navigation links here -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.manageUsers') }}">Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.manageBooks') }}">Manage Books</a>
            </li>
        </ul>
    </div>

    <style>
      
        .navbar {
            border-bottom: 1px solid #555555; 
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
        }

        .navbar-toggler-icon {
            
        }

        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: bold;
            
        }

        
    </style>
</nav>
