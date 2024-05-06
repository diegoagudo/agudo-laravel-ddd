<?php

declare(strict_types=1);

namespace App\City\Domain\ValueObjects;

use InvalidArgumentException;

readonly class SalaryAvgValueObject
{
    private const MIN = 1;

    public function __construct(readonly public float $value)
    {
        if (!$this->validate($value)) {
            throw new InvalidArgumentException('Salary avg can not be zero.');
        }
    }

    private function validate(float $value): bool
    {
        if ($value >= static::MIN) {
            return true;
        }

        return false;
    }
}
