<?php

declare(strict_types=1);

namespace App\City\Domain\Enums;

enum TimezoneEnum: string
{
    use EnumBaseTrait;

    case BRT = 'BRT';
    case EZT = 'EZT';
    case EET = 'EET';
    case FJT = 'FJT';
}
