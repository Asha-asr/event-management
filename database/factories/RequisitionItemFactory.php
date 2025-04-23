<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequisitionItem>
 */
class RequisitionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::inRandomOrder()->first()?->id ?? Event::factory(),
            'added_by' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'item_name' => $this->faker->word(),
            'is_claimed' => $this->faker->boolean(),
            'claimed_by' => null,
            'is_gift' => $this->faker->boolean(),
            'is_optional' => $this->faker->boolean(),
            'visibility' => $this->faker->randomElement(['public', 'private']),
        ];
    }
}
