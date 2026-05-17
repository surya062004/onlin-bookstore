<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
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

<div class="container my-4">
    <form method="GET" action="/books">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                   placeholder="Search books..." value="{{ request('search') }}">
            <button class="btn btn-primary">Search</button>
        </div>
    </form>
</div>

<div class="container mb-5">
    <h2>All Books</h2>
    <div class="row">
        @forelse($books as $book)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/200x300?text=No+Image" class="card-img-top" style="height:200px;object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="text-muted">{{ $book->author }}</p>
                    <p class="text-success fw-bold">Rs.{{ $book->price }}</p>
                    <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                        {{ $book->is_available ? 'Available' : 'Not Available' }}
                    </span>
                    <br><br>
                    <a href="/books/{{ $book->id }}" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <p>No books found!</p>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>© 2026 Online Book Store</p>
</footer>

</body>
</html>