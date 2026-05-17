<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">📚 BookStore</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/books">Books</a>
            <a class="nav-link" href="/login">Admin Login</a>
        </div>
    </div>
</nav>

<!-- Book Detail -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            @if($book->cover_image)
                <img src="{{ asset('storage/'.$book->cover_image) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x400?text=No+Image" class="img-fluid rounded">
            @endif
        </div>
        <div class="col-md-8">
            <h1>{{ $book->title }}</h1>
            <p class="text-muted fs-5">by {{ $book->author }}</p>
            <hr>
            <p><strong>Category:</strong> {{ $book->category->name ?? 'N/A' }}</p>
            <p><strong>Price:</strong> <span class="text-success fs-4">₹{{ $book->price }}</span></p>
            <p>
                <strong>Status:</strong>
                <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                    {{ $book->is_available ? 'Available' : 'Not Available' }}
                </span>
            </p>
            <hr>
            <p><strong>Description:</strong></p>
            <p>{{ $book->description ?? 'No description available.' }}</p>
            <a href="/books" class="btn btn-secondary">← Back to Books</a>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>© 2026 Online Book Store</p>
</footer>

</body>
</html>
