<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;

class VoteController extends Controller
{
    public function index()
    {
        $topAuthors = Author::select(
            'authors.id',
            'authors.name as author_name',
            \DB::raw('(SELECT COUNT(*) FROM ratings WHERE book_id IN (SELECT id FROM books WHERE author_id = authors.id)) as voteCount')
        )
        ->orderByDesc('voteCount')
        ->take(10)
        ->get();

        return view('authors.index', ['topAuthors' => $topAuthors]);
    }

    public function create()
    {
        $authors = Author::all();
        return view('ratings.create', ['authors' => $authors]);
    }
}
