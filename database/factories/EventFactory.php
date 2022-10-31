<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->catchPhrase();
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'subtitle' => fake()->company(),
            'summary' => fake()->paragraph(),
            'image' => fake()->imageUrl(640, 480, 'animals', true),
            'date' => fake()->dateTimeThisMonth(),
        ];
    }
}
