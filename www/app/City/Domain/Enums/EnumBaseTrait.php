<?php

declare(strict_types=1);

namespace App\City\Domain\Enums;

trait EnumBaseTrait
{
    public static function toArray(): array
    {
        return array_map(
            fn(self $enum) => $enum->value,
            self::cases(),
        );
    }
}
