<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

final class NewsArticleFactory extends Factory
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
            'url' => fake()->url(),
            'canonical_url' => fake()->url(),
            'title' => fake()->sentence(),
            'summary' => fake()->text(),
            'excerpt' => fake()->text(),
            'content_hash' => fn(array $a): string => Hash::make($a['summary']),
            'published_at' => fake()->dateTimeThisMonth(),
            'image_url' => fake()->imageUrl(),
            'keywords' => fake()->words(),
            'tags' => fake()->words(),
            'meta' => [],
        ];
    }
}
