<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'tags' => 'api',
            'company' => $this->faker->company(),
            'location' => $this->faker->country(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'description' => $this->faker->text()
        ];
    }
}
