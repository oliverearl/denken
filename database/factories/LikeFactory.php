<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

final class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fn(): Factory => User::factory(),
            'news_post_id' => fn(): Factory => NewsPost::factory(),
        ];
    }
}
