<?php

declare(strict_types=1);

namespace App\City\Domain\ValueObjects;

use Carbon\Carbon;
use InvalidArgumentException;

readonly class BirthdateValueObject
{
    public readonly Carbon $value;
    public function __construct(string $birthdate)
    {
        if (!$this->validate($birthdate)) {
            throw new InvalidArgumentException('Birthdate invalid.');
        }

        $this->value = Carbon::parse($birthdate);
    }

    private function validate(string $birthdate): bool
    {
        if (Carbon::parse($birthdate)->startOfDay()->lt(Carbon::now()->startOfDay())) {
            return true;
        }

        return false;
    }
}
