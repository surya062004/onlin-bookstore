<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">📚 BookStore</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/books">Books</a>
            <a class="nav-link" href="/login">Admin Login</a>
        </div>
    </div>
</nav>

<div class="bg-primary text-white py-5 text-center">
    <h1>Welcome to Online Book Store</h1>
    <p>Find your favourite books here!</p>
    <a href="/books" class="btn btn-light btn-lg">Browse Books</a>
</div>

<div class="container my-5">
    <h2>Latest Books</h2>
    <div class="row">
        @forelse($books as $book)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/200x300?text=No+Image" class="card-img-top" style="height:200px;object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text text-muted">{{ $book->author }}</p>
                    <p class="text-success fw-bold">Rs.{{ $book->price }}</p>
                    <a href="/books/{{ $book->id }}" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <p>No books available yet!</p>
        @endforelse
    </div>
</div>

<div class="bg-light py-5">
    <div class="container">
        <h2>Featured from Google Books</h2>
        <div class="row">
            @foreach($apiBooks as $book)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-title">{{ $book['volumeInfo']['title'] ?? 'Unknown' }}</h6>
                        <p class="text-muted small">{{ $book['volumeInfo']['authors'][0] ?? 'Unknown' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>© 2026 Online Book Store</p>
</footer>

</body>
</html>