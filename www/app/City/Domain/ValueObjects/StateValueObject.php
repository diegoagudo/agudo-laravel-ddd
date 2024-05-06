<?php

declare(strict_types=1);

namespace App\City\Domain\ValueObjects;

use App\City\Domain\Enums\StateEnum;
use InvalidArgumentException;

readonly class StateValueObject
{
    public function __construct(readonly public string $value)
    {
        if (!$this->validate($value)) {
            throw new InvalidArgumentException('State invalid.');
        }
    }

    private function validate(string $value): bool
    {
        if (StateEnum::tryFrom($value)) {
            return true;
        }

        return false;
    }
}
