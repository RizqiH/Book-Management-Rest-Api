<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all());
    }

    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
        return response()->json($book, 201);
    }

    public function show(Book $book)
    {
        return response()->json($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}