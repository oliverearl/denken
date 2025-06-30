<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

final class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->word(),
            'is_hidden' => false,
            'news_post_id' => fn(): Factory => NewsPost::factory(),
            'user_id' => fn(): Factory => User::factory(),
        ];
    }

    /**
     * Indicate that the comment is made by the user who owns the news post.
     */
    public function ownComment(): Factory
    {
        return $this->state(fn(array $a): array => [
            'user_id' => NewsPost::findOrFail($a['news_post_id'])->user_id,
        ]);
    }

    /**
     * Indicate that the comment is hidden.
     */
    public function hidden(): Factory
    {
        return $this->state(fn(): array => [
            'is_hidden' => true,
        ]);
    }
}
