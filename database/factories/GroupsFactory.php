<?php

namespace Database\Factories;

use App\Models\Groups;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model  = Groups::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'group_image' => $this->faker->phoneNumber(),
            'description' => $this->faker->sentence(),
            'location' => $this->faker->city(),
        ];
    }
}
