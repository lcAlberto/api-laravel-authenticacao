<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'color' => $this->faker->hexColor,
            'year' => $this->faker->year(),
            'vehicle_nameplate' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}
