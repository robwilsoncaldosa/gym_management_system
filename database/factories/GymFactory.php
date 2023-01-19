<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GymFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word,
            'address'=>$this->faker->address,
            'membership_fee'=>$this->faker->numberBetween($min=1000,$max=5000),

        ];
    }
}
