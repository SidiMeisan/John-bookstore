<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Top Books</h2>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('books.filter') }}">
                <label for="show">Show:</label>
                <select name="show" id="show">
                    @for ($i = 10; $i <= 100; $i += 10)
                        <option value="{{ $i }}" @if ($i == request('show', 10)) selected @endif>{{ $i }}</option>
                    @endfor
                </select>
                <label for="search">Search:</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}">
                <button type="submit">Apply</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Average Rating</th>
                    <th>Vote Count</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topBooks as $index => $book)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->category_name }}</td>
                        <td>{{ $book->author_name }}</td>
                        <td>{{ number_format($book->averageRating, 2) }}</td>
                        <td>{{ $book->voteCount }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No books available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
