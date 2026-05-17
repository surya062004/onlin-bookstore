<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $availableBooks = Book::where('is_available', true)->count();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalCategories', 
            'availableBooks'
        ));
    }
}