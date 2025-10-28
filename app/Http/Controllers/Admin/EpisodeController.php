<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index()
    {
        $episodes = Episode::with(['book', 'author'])->get();
        return view('admin.episodes.index', compact('episodes'));
    }

    public function create()
    {
        $books = Book::all(); // گرفتن تمام کتاب‌ها
        $authors = Author::all(); // گرفتن تمام نویسنده‌ها
        return view('admin.episodes.create', compact('books', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'book_id' => 'required|exists:books,id',
            'author_id' => 'required|exists:authors,id',
            'audio_url' => 'required|string|max:255',
            'duration' => 'nullable|integer',
        ]);

        Episode::create($request->all());

        return redirect()->route('episodes.index')->with('success', 'اپیزود اضافه شد.');
    }

    public function edit(Episode $episode)
    {
        $books = Book::all();
        $authors = Author::all();
        return view('admin.episodes.edit', compact('episode', 'books', 'authors'));
    }

    public function update(Request $request, Episode $episode)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'book_id' => 'required|exists:books,id',
            'author_id' => 'required|exists:authors,id',
            'audio_url' => 'required|string|max:255',
            'duration' => 'nullable|integer',
        ]);

        $episode->update($request->all());

        return redirect()->route('episodes.index')->with('success', 'اپیزود ویرایش شد.');
    }

    public function destroy(Episode $episode)
    {
        $episode->delete();
        return redirect()->route('episodes.index')->with('success', 'اپیزود حذف شد.');
    }
}
