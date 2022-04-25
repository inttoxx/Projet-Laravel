<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location' => $this->faker->city(),
        ];
    }
}
