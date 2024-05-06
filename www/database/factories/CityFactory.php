<?php

declare(strict_types=1);

namespace Database\Factories;

use App\City\Domain\Enums\StateEnum;
use App\City\Domain\Enums\TimezoneEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

/** @extends Factory<City> */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->city,
            'state' => fake()->randomElement(StateEnum::toArray()),
            'population' => fake()->numberBetween(10000, 1000000),
            'birthdate' => fake()->dateTimeBetween('-500 years', '-100 years'),
            'salary_avg' => fake()->randomFloat(2, 1000, 10000),
            'description' => fake()->text,
            'timezone' => fake()->randomElement(TimezoneEnum::toArray()),
        ];
    }
}
