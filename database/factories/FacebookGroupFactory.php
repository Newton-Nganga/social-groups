<?php

namespace Database\Factories;

use \App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacebookGroup>
 */
class FacebookGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_name' => $this->faker->word(),
            'group_link' => $this->faker->url(),
            'user_id' => User::factory(),
        ];
    }
}
