<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">📚 BookStore Admin</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/admin/dashboard">Dashboard</a>
            <a class="nav-link" href="/admin/books">Manage Books</a>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h2>Edit Book</h2>
    <hr>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/admin/books/{{ $book->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Price (₹)</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $book->price }}" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Available</label>
            <select name="is_available" class="form-control">
                <option value="1" {{ $book->is_available ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$book->is_available ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Cover Image</label>
            @if($book->cover_image)
                <img src="{{ asset('storage/'.$book->cover_image) }}" height="100" class="d-block mb-2">
            @endif
            <input type="file" name="cover_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">Update Book</button>
        <a href="/admin/books" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>© 2026 Online Book Store</p>
</footer>

</body>
</html>
