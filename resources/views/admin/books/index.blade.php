<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">📚 BookStore Admin</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/admin/dashboard">Dashboard</a>
            <form method="POST" action="/logout" style="display:inline">
                @csrf
                <button class="btn btn-outline-light btn-sm ms-2">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Manage Books</h2>
        <a href="/admin/books/create" class="btn btn-success">+ Add New Book</a>
    </div>
    <hr>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Category</th>
                <th>Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>₹{{ $book->price }}</td>
                <td>{{ $book->category->name ?? 'N/A' }}</td>
                <td>
                    <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                        {{ $book->is_available ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td>
                    <a href="/admin/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="/admin/books/{{ $book->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No books found!</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>© 2026 Online Book Store</p>
</footer>

</body>
</html>
