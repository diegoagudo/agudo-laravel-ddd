<?php

declare(strict_types=1);

namespace App\City\Domain\DataTransferObjects;

final class FindCityDto extends AbstractDto
{
    public ?array $birthdate;
    public ?array $population;
    public ?array $salary;

    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?string $state = null,
        public ?int $populationInitial = null,
        public ?int $populationEnd = null,
        public ?string $birthdateInitial = null,
        public ?string $birthdateEnd = null,
        public ?float $salaryInitial = null,
        public ?float $salaryEnd = null,
        public ?string $timezone = null,
        public ?string $sortField = null,
        public ?string $sortDirection = null,
    ) {
    }

    public function toArray(): array
    {
        $this->convertInitialAndEndToArray();

        return parent::toArray();
    }

    protected function convertInitialAndEndToArray(): void
    {
        if ($this->birthdateInitial && $this->birthdateEnd) {
            $this->birthdate = [
                $this->birthdateInitial,
                $this->birthdateEnd,
            ];
        }

        if ($this->populationInitial && $this->populationEnd) {
            $this->population = [
                $this->populationInitial,
                $this->populationEnd,
            ];
        }

        if ($this->salaryInitial && $this->salaryEnd) {
            $this->salary = [
                $this->salaryInitial,
                $this->salaryEnd,
            ];
        }
    }
}
