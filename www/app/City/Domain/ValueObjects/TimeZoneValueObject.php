<?php

declare(strict_types=1);

namespace App\City\Domain\ValueObjects;

use App\City\Domain\Enums\TimezoneEnum;
use InvalidArgumentException;

readonly class TimeZoneValueObject
{
    public function __construct(readonly public string $value)
    {
        if (!$this->validate($value)) {
            throw new InvalidArgumentException('Timezone invalid.');
        }
    }

    private function validate(string $value): bool
    {
        if (TimezoneEnum::tryFrom($value)) {
            return true;
        }

        return false;
    }
}
