<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'creator_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'event_for_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'title' => $this->faker->sentence(3),
            'event_date' => $this->faker->date(),
            'event_time' => $this->faker->time(),
            'event_type' => $this->faker->randomElement(['Birthday', 'Wedding', 'Housewarming']),
            'event_guidelines' => $this->faker->paragraph(),
        ];
    
    }
}
