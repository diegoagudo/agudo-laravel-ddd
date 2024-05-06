<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Domain\ValueObjects\BirthdateValueObject;
use App\City\Domain\ValueObjects\PopulationValueObject;
use Carbon\Carbon;
use InvalidArgumentException;
use Tests\TestCase;

class PopulationValueObjectTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_population_cant_be_zero(): void
    {
        $this->expectExceptionMessage('Population quantity invalid. Can not be zero!');
        $this->expectException(InvalidArgumentException::class);
        $population = new PopulationValueObject(0);
    }

    public function test_population_can_be_greater_than_zero(): void
    {
        $populationQty = 1;
        $population = new PopulationValueObject(1);
        $this->assertIsObject($population);
        $this->assertEquals($populationQty, $population->value);
    }
}
