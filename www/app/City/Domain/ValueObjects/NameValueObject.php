<?php

declare(strict_types=1);

namespace App\City\Domain\ValueObjects;

use InvalidArgumentException;

readonly class NameValueObject
{
    private const MIN_LENGTH = 3;
    private const MAX_LENGTH = 100;

    public function __construct(readonly public string $value)
    {
        if (!$this->validate($value)) {
            throw new InvalidArgumentException('Name invalid.');
        }
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    private function validate(string $value): bool
    {
        $nameLength = strlen($value);
        if ($nameLength >= static::MIN_LENGTH && $nameLength <= static::MAX_LENGTH) {
            return true;
        }

        return false;
    }
}
