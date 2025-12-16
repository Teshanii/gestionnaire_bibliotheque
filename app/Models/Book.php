<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'summary',
        'published_year',
        'isbn',
        'category_id'
    ];

    // Un livre appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
