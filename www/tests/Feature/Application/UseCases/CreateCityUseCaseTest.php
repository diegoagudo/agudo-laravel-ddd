<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Application\UseCases\CreateCityUseCase;
use App\City\Domain\DataTransferObjects\CreateCityDto;
use App\City\Domain\Enums\StateEnum;
use App\City\Domain\Enums\TimezoneEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateCityUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_city_with_success(): void
    {
        $createCityUseCase = app(CreateCityUseCase::class);

        $cityDto = new CreateCityDto(
            name: fake()->unique()->city,
            description: fake()->text,
            state: fake()->randomElement(StateEnum::toArray()),
            population: fake()->numberBetween(10000, 1000000),
            birthdate: fake()->dateTimeBetween('-500 years', '-100 years')->format('Y-m-d'),
            salaryAvg: fake()->randomFloat(2, 1000, 10000),
            timezone: fake()->randomElement(TimezoneEnum::toArray()),
        );

        $response = $createCityUseCase->execute($cityDto);
        $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getStatusCode());
    }

    public function test_create_city_with_name_invalid(): void
    {
        $createCityUseCase = app(CreateCityUseCase::class);

        $cityDto = new CreateCityDto(
            name: '',
            description: fake()->text,
            state: fake()->randomElement(StateEnum::toArray()),
            population: fake()->numberBetween(10000, 1000000),
            birthdate: fake()->dateTimeBetween('-500 years', '-100 years')->format('Y-m-d'),
            salaryAvg: fake()->randomFloat(2, 1000, 10000),
            timezone: fake()->randomElement(TimezoneEnum::toArray()),
        );

        $response = $createCityUseCase->execute($cityDto);

        $this->assertEquals(Response::HTTP_UNPROCESSABLE_ENTITY, $response->getStatusCode());
        $this->assertEquals('Name invalid.', $response->getData()->errors[0]->message);
    }
}
