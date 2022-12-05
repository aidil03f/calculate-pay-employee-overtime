<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'name' => $this->faker->randomElement(['Salary / 173','Fixed']),
            'expression' => ''
        ];
    }
}
