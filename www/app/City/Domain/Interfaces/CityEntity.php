<?php

declare(strict_types=1);

namespace App\City\Domain\Interfaces;

use Carbon\Carbon;

interface CityEntity
{
    public function getId(): int;

    public function getName(): string;
    public function setName(string $name): self;

    public function getDescription(): string;
    public function setDescription(string $description): self;

    public function getPopulation(): int;
    public function setPopulation(int $populationQty): self;

    public function getBirthdate(): Carbon;
    public function setBirthdate(Carbon $birthdate): self;

    public function getSalaryAvg(): float;
    public function setSalaryAvg(float $salaryAvg): self;

    public function getTimezone(): string;
    public function setTimezone(string $timezone): self;

    public function getState(): string;
    public function setState(string $timezone): self;
}
