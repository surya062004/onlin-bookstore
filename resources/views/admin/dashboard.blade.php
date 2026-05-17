<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">📚 BookStore Admin</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/admin/books">Manage Books</a>
            <form method="POST" action="/logout" style="display:inline">
                @csrf
                <button class="btn btn-outline-light btn-sm ms-2">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- Dashboard -->
<div class="container my-5">
    <h2>Admin Dashboard</h2>
    <hr>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <h1>{{ $totalBooks }}</h1>
                    <p>Total Books</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <h1>{{ $availableBooks }}</h1>
                    <p>Available Books</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body text-center">
                    <h1>{{ $totalCategories }}</h1>
                    <p>Categories</p>
                </div>
            </div>
        </div>
    </div>

    <a href="/admin/books" class="btn btn-primary mt-3">Manage Books</a>
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>© 2026 Online Book Store</p>
</footer>

</body>
</html>
