<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true), //true - string returned instead of array
            'description' => $this->faker->text(50),
            'condition_id' => $this->faker->numberBetween(1,5),
            'user_id' => $this->faker->numberBetween(1,6),
            'min_bid' => $this->faker->randomFloat(4, 0, 100),
            'is_active' => $this->faker->numberBetween(0,1),
            'end_date' => $this->faker->dateTimeBetween('+1 days', '+4 weeks'),
        ];
    }
}
