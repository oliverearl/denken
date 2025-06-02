<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Bias;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class NewsSourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->company(),
            'slug' => fn(array $a) => Str::slug($a['name']),
            'bias' => fake()->randomElement(Bias::cases()),
            'homepage' => fake()->url(),
            'domain' => fake()->domainName(),
            'country' => fake()->country(),
            'language' => fake()->languageCode(),
            'is_verified' => fake()->boolean(),
            'last_reviewed_at' => fake()->dateTimeThisYear(),
        ];
    }
}
