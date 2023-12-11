<!-- resources/views/ratings/create.blade.php -->

@extends('layouts.app')
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/ratings.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <h2>Rate a Book</h2>

        <form method="POST" action="{{ route('ratings.simpan') }}">
            @csrf
            <div class="form-group">
                <label for="author">Author:</label>
                <select name="author" id="author">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="book">Book:</label>
                <select name="book" id="book">
                    <!-- Books will be dynamically populated based on the selected author -->
                </select>
            </div>
        
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
