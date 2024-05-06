<?php

declare(strict_types=1);

namespace App\City\Domain\ValueObjects;

use InvalidArgumentException;

readonly class PopulationValueObject
{
    private const MIN = 1;

    public function __construct(readonly public int $value)
    {
        if (!$this->validate($value)) {
            throw new InvalidArgumentException('Population quantity invalid. Can not be zero!');
        }
    }

    private function validate(int $value): bool
    {
        if ($value >= static::MIN) {
            return true;
        }

        return false;
    }
}
