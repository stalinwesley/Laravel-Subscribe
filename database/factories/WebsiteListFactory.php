<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebsiteList>
 */
class WebsiteListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'website_title' => $this->faker->word(),
            'website_descrition' => $this->faker->sentence(),
            'created_at' => now(),
        ];
    }
}
