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
            'facebook' => $this->faker->userName(),
            'x' => $this->faker->userName(),
            'instagram' => $this->faker->userName(),
            'tiktok' => $this->faker->userName(),
            'threads' => $this->faker->userName(),
            'bsky' => $this->faker->userName(),
            'linkedin' => $this->faker->userName(),
        ];
    }
}
