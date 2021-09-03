<?php

namespace Database\Factories;

use App\Models\Lending;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LendingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lending::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->randomFloat(2, 100, 900),
            'start_date' => $this->faker->dateTimeBetween('2021-01-01 00:00:00', today()),
            'return_date' => $this->faker->dateTimeInInterval(today(), Carbon::now()->subDays(30)),
            'car_id' => $this->faker->numberBetween(1, 99),
            'user_id' => $this->faker->numberBetween(1, 99),
        ];
    }
}
