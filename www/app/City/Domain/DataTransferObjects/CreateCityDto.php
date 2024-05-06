<?php

declare(strict_types=1);

namespace App\City\Domain\DataTransferObjects;

final class CreateCityDto extends AbstractDto
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public ?string $state,
        public ?int $population,
        public ?string $birthdate,
        public ?float $salaryAvg,
        public ?string $timezone,
    ) {
    }
}
