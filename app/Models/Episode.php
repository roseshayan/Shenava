<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'title', 'audio_url', 'duration', 'position_in_series'];

    // هر اپیزود متعلق به یک کتاب است
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
