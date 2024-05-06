<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Application\Repositories\CityRepository;
use App\City\Application\UseCases\FindCityByCriteriaUseCase;
use App\City\Domain\DataTransferObjects\FindCityDto;
use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FindCityByCriteriaUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_find_city_by_name(): void
    {
        $cityFactory = City::factory()->create();

        $findCityDto = new FindCityDto(
            name: $cityFactory->getName(),
        );

        $findCityByCriteriaUseCase = app(FindCityByCriteriaUseCase::class);

        $response = $findCityByCriteriaUseCase->execute($findCityDto);

        $this->assertIsObject($response);
        $this->assertEquals($cityFactory->getId(), $response[0]->getId());
    }

    public function test_find_city_by_population(): void
    {
        $cityFactory = City::factory()->create();

        $findCityDto = new FindCityDto(
            name: $cityFactory->getName(),
            populationInitial: $cityFactory->getPopulation() - 1,
            populationEnd: $cityFactory->getPopulation() + 1,
        );

        $findCityByCriteriaUseCase = app(FindCityByCriteriaUseCase::class);

        $response = $findCityByCriteriaUseCase->execute($findCityDto);

        $this->assertIsObject($response);
        $this->assertEquals($cityFactory->getId(), $response[0]->getId());
    }

    public function test_find_city_by_salary(): void
    {
        $cityFactory = City::factory()->create();

        $findCityDto = new FindCityDto(
            name: $cityFactory->getName(),
            salaryInitial: $cityFactory->getSalaryAvg() - 1,
            salaryEnd: $cityFactory->getSalaryAvg() + 1,
        );

        $findCityByCriteriaUseCase = app(FindCityByCriteriaUseCase::class);

        $response = $findCityByCriteriaUseCase->execute($findCityDto);

        $this->assertIsObject($response);
        $this->assertEquals($cityFactory->getId(), $response[0]->getId());
    }

    public function test_find_city_by_birthdate(): void
    {
        $cityFactory = City::factory()->create();

        $findCityDto = new FindCityDto(
            name: $cityFactory->getName(),
            birthdateInitial: $cityFactory->getBirthdate()->subDay(1)->format('Y-m-d'),
            birthdateEnd: $cityFactory->getBirthdate()->addDay(1)->format('Y-m-d'),
        );

        $findCityByCriteriaUseCase = app(FindCityByCriteriaUseCase::class);

        $response = $findCityByCriteriaUseCase->execute($findCityDto);

        $this->assertIsObject($response);
        $this->assertEquals($cityFactory->getId(), $response[0]->getId());
    }

    public function test_find_city_sort_direction_desc(): void
    {
        $cityFactory = City::factory()->times(10)->create();

        $findCityDto = new FindCityDto(
            sortDirection: CityRepository::SORT_DIRECTION_DESC,
        );

        $findCityByCriteriaUseCase = app(FindCityByCriteriaUseCase::class);

        $response = $findCityByCriteriaUseCase->execute($findCityDto);

        $this->assertIsObject($response);
        $this->assertEquals($cityFactory[9]->getId(), $response[0]->getId());
    }
}
