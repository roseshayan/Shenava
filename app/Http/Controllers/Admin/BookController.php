<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'category')->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
