<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'cat_id' => 1,
            'description' => $this->faker->sentence(),
            'picture_extension' => '.jpg',
            'price' => $this->faker->numberBetween(50, 500),
            'location_id' => 1,
            'user_id' => 1,
            'usure' => 'BrandNew',
        ];
    }
}
