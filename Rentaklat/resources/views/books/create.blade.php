<!-- Your form for creating a new book goes here -->
<form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control mb-3" required>

    <label for="description">Description:</label>
    <textarea name="description" class="form-control mb-3" required></textarea>

    <label for="genre">Genre:</label>
    <input type="text" name="genre" class="form-control mb-3" required>

    <!-- Add an input field for the book image -->
    <label for="image">Image:</label>
    <input type="file" name="image" class="form-control mb-3" accept="image/*" required>

    <!-- Add more fields as needed -->

    <button type="submit" class="btn btn-primary">Create Book</button>
    
</form>

