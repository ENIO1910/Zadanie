<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'brand' => $this->faker->name(),
            'model' => $this->faker->name(),
            'year' => $this->faker->date('Y')
        ];
    }
}

