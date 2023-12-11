<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id', 
        'category_id', 
        'name'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function scopeOrderByAverageRating($query, $direction = 'desc')
    {
        return $query->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->groupBy('books.id')
            ->orderByRaw('AVG(ratings.rating) ' . $direction);
    }
}
