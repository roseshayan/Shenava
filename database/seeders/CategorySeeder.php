<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $bookAudio = Category::create(['name' => 'کتاب صوتی']);
        $novel = Category::create(['name' => 'داستان و رمان', 'parent_id' => $bookAudio->id]);
        $foreignNovel = Category::create(['name' => 'داستان و رمان خارجی', 'parent_id' => $novel->id]);
        Category::create(['name' => 'فانتزی', 'parent_id' => $foreignNovel->id]);
    }
}
