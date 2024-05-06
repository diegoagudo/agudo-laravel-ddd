<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Domain\Enums\StateEnum;
use App\City\Domain\Enums\TimezoneEnum;
use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }
    
    public function test_city_creation(): void
    {
        $data = [
            'name' => 'São Paulo',
            'state' => StateEnum::SP,
            'description' => 'Sampa',
            'population' => 2000000,
            'salary_avg' => 20000,
            'timezone' => TimezoneEnum::BRT,
        ];

        $city = City::factory()->create($data);

        $this->assertEquals($data['name'], $city->name);
    }
}
