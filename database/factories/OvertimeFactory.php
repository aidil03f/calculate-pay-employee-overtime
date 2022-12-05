<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class OvertimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::all()->random()->id,
            'date' => $this->faker->unique()->date($format = 'Y-m-d',$max = 'now'),
            'time_started' => $this->faker->time($format = 'H:i:s',$max = 'now'),
            'time_ended' =>  $this->faker->time($format = 'H:i:s',$max = 'now')
        ];
    }
}
