<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #560000;
        }

        .custom-container {
            margin-top: 50px;
        }

        h1 {
            color: #F9F9F9;
        }

        .dashboard-section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard-section h2 {
            color: #560000;
        }

        .dashboard-section p {
            color: #560000;
        }

        .log-container {
            max-height: 200px;
            overflow-y: auto; 
        }

        .dashboard-links {
            margin-top: 20px;
        }

        .dashboard-links a {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    @include('admin.navbar')

    <div class="container custom-container">
        <h1>Admin Dashboard</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-section">
                    <h2>Student Accounts</h2>
                    <p>Total number of student accounts: {{ $totalStudents }}</p>
            
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-section">
                    <h2>Owner Accounts</h2>
                    <p>Total number of owner accounts: {{ $totalOwners }}</p>
        
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-section">
                    <h2>Book Statistics</h2>
                    <p>Total number of books: {{ $totalBooks }}</p>
                    
                </div>
            </div>
        </div>

        <div class="dashboard-section log-container">
            <h2>Logs</h2>
            <ul>
                @foreach (explode("\n", $logs) as $log)
                    <li>{{ $log }}</li>
                @endforeach
            </ul>
        </div>

    </div>

    <!-- Bootstrap JS (required for modal functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>