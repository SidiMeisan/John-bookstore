<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Rating;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $requests)
    {
        $limit = $requests->input('show', 10);
        $search = $requests->input('search');

        $query = Book::join('categories', 'books.category_id', '=', 'categories.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select(
                'books.name as book_name',
                'categories.name as category_name',
                'authors.name as author_name',
                \DB::raw('(SELECT ROUND(AVG(rating), 2) FROM ratings WHERE book_id = books.id) as averageRating'),
                \DB::raw('(SELECT COUNT(*) FROM ratings WHERE book_id = books.id) as voteCount')
            )
            ->orderByDesc('averageRating');

        // Add search condition
        if ($search) {
            $query->where('books.name', 'LIKE', "%$search%")
                  ->orWhere('authors.name', 'LIKE', "%$search%");
        }

        $topBooks = $query->take($limit)->get();

        return view('books.index', ['topBooks' => $topBooks]);
    }

    public function storeRating(Request $request)
    {
        // Create a new rating
        Rating::create([
            'book_id' => $request->input('book'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('books.filter')->with('success', 'Rating submitted successfully.');
    }

    public function getBooksByAuthor(Request $request)
    {
        $authorId = $request->input('author_id');
        $books = Book::where('author_id', $authorId)->get();

        return response()->json(['books' => $books]);
    }
}
