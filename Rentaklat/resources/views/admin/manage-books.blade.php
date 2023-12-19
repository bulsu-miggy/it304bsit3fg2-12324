<!-- resources/views/admin/manage-books.blade.php -->
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
        <h1>Manage Books</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->owner->last_name }}, {{ $book->owner->first_name }}</td>
                        <td>
                            <!-- Edit Button (Open Modal) -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $book->id }}">
                                Edit
                            </button>

                            <!-- Remove Button -->
                            <form action="{{ route('admin.removeBook', ['book' => $book->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $book->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Add your edit form content here, e.g., a form with input fields for updating book information -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $book->id }}">Edit Book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Your edit form content goes here -->
                                    <form action="{{ route('admin.updateBook', ['book' => $book->id]) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <!-- Add your form fields for editing book information -->
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">first name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $book->owner->first_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">last name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $book->owner->last_name }}">
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
        <button class="print"> <a href="{{ url('/books/pdf') }}" target="_blank" style="color: #F9f9f9"><i class='bx bx-printer' ></i> Print PDF</a></button>
    </div>
    </div>


    

    <!-- Bootstrap JS (required for modal functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>