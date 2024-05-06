<?php

declare(strict_types=1);

namespace App\City\Application\Repositories;

use App\City\Domain\City;
use App\City\Domain\DataTransferObjects\FindCityDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CityRepository
{
    public const MAX_RESULT_PER_PAGE = 10;
    public const DEFAULT_SORT_FIELD = 'id';
    public const SORT_DIRECTION_ASC = 'ASC';
    public const SORT_DIRECTION_DESC = 'DESC';
    public function save(City $city): void;
    public function findByCriteria(FindCityDto $findCityDto): LengthAwarePaginator;
}
