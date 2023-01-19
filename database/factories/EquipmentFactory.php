<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name,
            "weight"=>$this->faker->numberBetween($min=10,$max=300),
            "muscles_used"=>$this->faker->word
        ];
    }
}
