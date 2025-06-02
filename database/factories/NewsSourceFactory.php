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
            'name' => $this->faker->name(),
            'slug' => fn(array $a) => Str::slug($a['name']),
            'bias' => $this->faker->randomElement(Bias::cases()),
            'homepage' => $this->faker->url(),
            'domain' => $this->faker->domainName(),
            'country' => $this->faker->country(),
            'language' => $this->faker->languageCode(),
            'is_verified' => $this->faker->boolean(),
            'last_reviewed_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
