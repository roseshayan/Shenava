<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Episode;
use App\Models\Book;

class EpisodeFactory extends Factory
{
    protected $model = Episode::class;

    public function definition()
    {
        return [
            'book_id' => Book::factory(),
            'title' => $this->faker->sentence(4),
            'audio_url' => $this->faker->url(), // بعداً می‌تونیم لینک mp3 واقعی بذاریم
            'duration' => $this->faker->numberBetween(300, 3600), // ثانیه
            'position_in_series' => $this->faker->numberBetween(1, 20),
        ];
    }
}
