<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
{
    $books = Book::query()
        ->when($request->search, fn($q) =>
            $q->where('title', 'like', "%{$request->search}%")
              ->orWhere('author', 'like', "%{$request->search}%")
        )
        ->where('is_available', true)
        ->with('category')
        ->paginate(12);

    return view('books.index', compact('books'));
}

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}