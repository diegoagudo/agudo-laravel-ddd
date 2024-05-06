<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Domain\Enums\TimezoneEnum;
use App\City\Domain\ValueObjects\TimeZoneValueObject;
use InvalidArgumentException;
use Tests\TestCase;

class TimezoneValueObjectTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_timezone_unknown(): void
    {
        $this->expectExceptionMessage('Timezone invalid.');
        $this->expectException(InvalidArgumentException::class);
        $salaryAvg = new TimeZoneValueObject('EBT');
    }

    public function test_state_listed(): void
    {
        $timezone = new TimeZoneValueObject(TimezoneEnum::EET->value);
        $this->assertIsObject($timezone);
        $this->assertEquals(TimezoneEnum::EET->value, $timezone->value);
    }
}
