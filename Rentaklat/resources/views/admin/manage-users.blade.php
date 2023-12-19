<!-- resources/views/admin/manage-users.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
    <style>
       
        body {
            background-color: #560000;
        }

        .custom-container {
            margin-top: 50px;
            background-color: #ffffff; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        h1 {
            color: #560000;
        }
        .print{
            background-color: #b66025;
            border: none;
            border-radius: 10px;
            padding: 8px;
        }
    
    </style>
</head>
<body>
    @include('admin.navbar')

    <div class="container custom-container">
        <h1>Manage Users</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- Edit Button (Open Modal) -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $user->id }}">
                                Edit
                            </button>

                            <!-- Remove Button -->
                            <form action="{{ route('admin.removeUser', ['user' => $user->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Add your edit form content here, e.g., a form with input fields for updating user information -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Your edit form content goes here -->
                                    <form action="{{ route('admin.updateUser', ['user' => $user->id]) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <!-- Add your form fields for editing user information -->
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <div style="display: flex; justify-content: flex-end;"> 
        <button class = "print"> <a href="{{ url('/users/pdf') }}" target="_blank" style="color: #F9f9f9"><i class='bx bx-printer' ></i> Print PDF</a></button>
    </div>
    </div>



    <!-- Bootstrap JS (required for modal functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
