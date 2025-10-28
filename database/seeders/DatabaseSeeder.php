<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use App\Models\Episode;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ایجاد چند دسته
        $categories = Category::factory(5)->create();

        // ایجاد چند نویسنده و کتاب
        $authors = Author::factory(5)->create();

        foreach ($authors as $author) {
            $books = Book::factory(3)->for($author)->create([
                'category_id' => $categories->random()->id
            ]);

            foreach ($books as $book) {
                Episode::factory(5)->for($book)->create();
            }
        }
    }
}
