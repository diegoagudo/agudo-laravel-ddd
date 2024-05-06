<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Domain\ValueObjects\SalaryAvgValueObject;
use InvalidArgumentException;
use Tests\TestCase;

class SalaryAvgValueObjectTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_salary_avg_cant_be_zero(): void
    {
        $this->expectExceptionMessage('Salary avg can not be zero.');
        $this->expectException(InvalidArgumentException::class);
        $salaryAvg = new SalaryAvgValueObject(0);
    }

    public function test_salary_avg_can_be_greater_than_zero(): void
    {
        $salaryAvgValue = 1;
        $salaryAvg = new SalaryAvgValueObject(1);
        $this->assertIsObject($salaryAvg);
        $this->assertEquals($salaryAvgValue, $salaryAvg->value);
    }
}
