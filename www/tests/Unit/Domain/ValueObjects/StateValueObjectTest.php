<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Domain\Enums\StateEnum;
use App\City\Domain\ValueObjects\StateValueObject;
use InvalidArgumentException;
use Tests\TestCase;

class StateValueObjectTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_state_unknown(): void
    {
        $this->expectExceptionMessage('State invalid.');
        $this->expectException(InvalidArgumentException::class);
        $salaryAvg = new StateValueObject('XP');
    }

    public function test_state_listed(): void
    {
        $state = new StateValueObject(StateEnum::SP->value);
        $this->assertIsObject($state);
        $this->assertEquals(StateEnum::SP->value, $state->value);
    }
}
