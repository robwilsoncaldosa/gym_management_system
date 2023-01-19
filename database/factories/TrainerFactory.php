<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TrainerFactory extends Factory
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
            'age'=>$this->faker->numberBetween($min=25,$max=40),
            'address'=>$this->faker->address,
            'user_id'=>User::first(),
        ];
    }
}
