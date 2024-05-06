<?php

declare(strict_types=1);

namespace App\City\Domain;

use App\City\Domain\DataTransferObjects\CreateCityDto;
use App\City\Domain\ValueObjects\BirthdateValueObject;
use App\City\Domain\ValueObjects\NameValueObject;
use App\City\Domain\ValueObjects\PopulationValueObject;
use App\City\Domain\ValueObjects\SalaryAvgValueObject;
use App\City\Domain\ValueObjects\StateValueObject;
use App\City\Domain\ValueObjects\TimeZoneValueObject;

final class City
{
    private function __construct(
        readonly public NameValueObject $name,
        readonly public StateValueObject $state,
        readonly public PopulationValueObject $population,
        readonly public BirthdateValueObject $birthdate,
        readonly public SalaryAvgValueObject $salaryAvg,
        readonly public TimeZoneValueObject $timezone,
    ) {
    }

    /**
     * @param CreateCityDto $cityDto
     *
     * @return self
     */
    public static function create(CreateCityDto $cityDto): self
    {
        return new self(
            new NameValueObject($cityDto->name),
            new StateValueObject($cityDto->state),
            new PopulationValueObject($cityDto->population),
            new BirthdateValueObject($cityDto->birthdate),
            new SalaryAvgValueObject($cityDto->salaryAvg),
            new TimeZoneValueObject($cityDto->timezone),
        );
    }
}
