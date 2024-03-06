<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Book::query();
        return view('admin.books.index', ['books' => $query->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.manage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_at' => 'required',
            'isbn' => 'required|unique:books',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'cover' => 'nullable|file',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'price' => $request->price,
            'cover_url' => $request->cover ? $request->cover->store('public/images') : null,
        ]);

        return redirect('/admin/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return redirect('/books/' . $book->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.books.manage', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_at' => 'required',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'description' => 'nullable',
            'price' => 'required|numeric',
            'cover' => 'nullable|file',
        ]);

        if($request->cover && $book->cover_url){
            Storage::delete($book->cover_url);
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'price' => $request->price,
            'cover_url' => $request->cover ? $request->cover->store('public/images') : $book->cover_url,
        ]);

        return redirect('/admin/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/admin/books');
    }

    public function index_client(Request $request)
    {
        $query = Book::query();
        if($request->search)
        {
            $query->where('title', 'like', '%' . $request->search . '%')
            ->orWhere('author', 'like', '%' . $request->search . '%');
        }
        return view('books.index', ['books' => $query->get()]);
    }

    public function show_client(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }
}
