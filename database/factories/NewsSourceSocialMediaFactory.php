<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Factories\Factory;

final class NewsSourceSocialMediaFactory extends Factory
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
            'facebook' => fake()->userName(),
            'x' => fake()->userName(),
            'instagram' => fake()->userName(),
            'tiktok' => fake()->userName(),
            'threads' => fake()->userName(),
            'bsky' => fake()->userName(),
            'linkedin' => fake()->userName(),
        ];
    }
}
