<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class NewsArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'news_source_id' => fn(): Factory => NewsSource::factory(),
            'url' => $this->faker->url(),
            'canonical_url' => $this->faker->url(),
            'title' => $this->faker->sentence(),
            'summary' => $this->faker->text(),
            'excerpt' => $this->faker->text(),
            'content_hash' => fn(array $a): string => Hash::make($a['summary']),
            'published_at' => $this->faker->dateTimeThisMonth(),
            'image_url' => $this->faker->imageUrl(),
            'keywords' => $this->faker->words(),
            'tags' => $this->faker->words(),
            'meta' => [],
        ];
    }
}
