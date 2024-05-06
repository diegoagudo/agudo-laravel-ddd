<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Domain\ValueObjects\BirthdateValueObject;
use Carbon\Carbon;
use InvalidArgumentException;
use Tests\TestCase;

class BirthdateValueObjectTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_birthdate_not_today(): void
    {
        $this->expectExceptionMessage('Birthdate invalid.');
        $this->expectException(InvalidArgumentException::class);
        $birthdate = new BirthdateValueObject(Carbon::now()->format('Y-m-d'));
    }

    public function test_birthdate_not_tomorrow_today(): void
    {
        $this->expectExceptionMessage('Birthdate invalid.');
        $this->expectException(InvalidArgumentException::class);
        $birthdate = new BirthdateValueObject(Carbon::now()->addDays(10)->format('Y-m-d'));
    }

    public function test_birthdate_yesterday(): void
    {
        $data = Carbon::now()->subDays(1)->format('Y-m-d');
        $birthdate = new BirthdateValueObject($data);
        $this->assertIsObject($birthdate);
        $this->assertEquals($data, $birthdate->value->format('Y-m-d'));
    }
}
