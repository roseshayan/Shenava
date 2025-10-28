<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'category_id', 'description', 'cover_url'];

    // کتاب متعلق به یک نویسنده است
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // کتاب متعلق به یک دسته است
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // یک کتاب می‌تواند چند اپیزود داشته باشد
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
