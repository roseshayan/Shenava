<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bio'];

    // یک نویسنده می‌تواند چند کتاب داشته باشد
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
