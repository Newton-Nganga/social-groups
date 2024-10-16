<?php

namespace Database\Factories;

use App\Models\Analytics;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Analytics>
 */
class AnalyticsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model =  Analytics::class;
     
    public function definition(): array
    {
        return [
            'device_type' => $this->faker->randomElement(['mobile', 'desktop', 'tablet']),
            'page' => $this->faker->url(),
            'ip_address' => $this->faker->ipv4(),
        ];
    }
}
