<?php

declare(strict_types=1);

namespace App\City\Domain\DataTransferObjects;

abstract class AbstractDto
{
    /** @return array */
    public function toArray(): array
    {
        $attributes = (array) $this;

        return array_combine(array_map(fn ($key, $value) => strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key)), array_keys($attributes), array_values($attributes)), $attributes);
    }
}
