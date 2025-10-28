<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/books
    public function index()
    {
        $books = Book::with('author', 'category', 'episodes')->get();
        return response()->json($books);
    }

    // GET /api/books/{id}
    public function show($id)
    {
        $book = Book::with('author', 'category', 'episodes')->findOrFail($id);
        return response()->json($book);
    }
}
