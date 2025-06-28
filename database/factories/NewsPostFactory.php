<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

final class NewsPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->uuid(),
            'content' => fake()->paragraphs(asText: true),
            'user_id' => fn(): Factory => User::factory(),
            'news_article_id' => fn(): Factory => NewsArticle::factory(),
            'is_limited' => fake()->boolean(),
            'is_hidden' => fake()->boolean(),
            'is_pinned' => fake()->boolean(),
            'geolocation' => implode(',', fake()->localCoordinates()),
            'meta' => [],
        ];
    }
}
