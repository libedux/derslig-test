<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'venue_id' => $this->faker->numberBetween(1, 5),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(3),
            'image_url' => $this->faker->imageUrl(640, 480, 'events', true),
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
        ];
    }
}
