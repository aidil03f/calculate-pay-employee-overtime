<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'value' => $this->faker->randomElement([1,0])
        ];
    }
}
