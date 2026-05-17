<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::where('is_available', true)
                     ->latest()
                     ->take(8)
                     ->get();

        $apiBooks = $this->fetchGoogleBooks();

        return view('home', compact('books', 'apiBooks'));
    }

    private function fetchGoogleBooks()
    {
        try {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
                'q' => 'fiction',
                'maxResults' => 4,
            ]);
            return $response->json()['items'] ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
}