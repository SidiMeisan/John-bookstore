<!-- resources/views/authors/top.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Top Authors</h2>

        <!-- Authors Table -->
        <table class="table">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Author Name</th>
                    <th>Vote Count</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody>
                @forelse ($topAuthors as $index => $author)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $author->author_name }}</td>
                        <td>{{ $author->voteCount }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No authors available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
