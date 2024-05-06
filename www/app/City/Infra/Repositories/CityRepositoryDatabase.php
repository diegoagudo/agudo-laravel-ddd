<?php

declare(strict_types=1);

namespace App\City\Infra\Repositories;

use App\City\Application\Repositories\CityRepository;
use App\City\Domain\City;
use App\City\Domain\DataTransferObjects\FindCityDto;
use Illuminate\Database\Eloquent\Builder;
use App\Models\City as CityModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CityRepositoryDatabase implements CityRepository
{
    /** @param CityModel $cityModel */
    public function __construct(private CityModel $cityModel)
    {
    }

    /**
     * @param City $city
     *
     * @return void
     */
    public function save(City $city): void
    {
        $this->cityModel->create([
            'name' => $city->name->value,
            'description' => $city->name->value,
            'state' => $city->state->value,
            'population' => $city->population->value,
            'birthdate' => $city->birthdate->value,
            'salary_avg' => $city->salaryAvg->value,
            'timezone' => $city->timezone->value,
        ]);
    }

    /**
     * @param FindCityDto $findCityDto
     *
     * @return LengthAwarePaginator
     */
    public function findByCriteria(FindCityDto $findCityDto): LengthAwarePaginator
    {
        $query = $this->cityModel->query();

        foreach ($findCityDto->toArray() as $key => $value) {
            if ($value) {
                $query = $this->applyCondition($query, $key, $value);
            }
        }

        $query = $this->applySort($query, $findCityDto);

        return $query->paginate(static::MAX_RESULT_PER_PAGE)->appends(request()->query());
    }

    /**
     * @param Builder $query
     * @param FindCityDto $findCityDto
     *
     * @return Builder
     */
    protected function applySort(Builder $query, FindCityDto $findCityDto): Builder
    {
        $sortDirection = $findCityDto->sortDirection === static::SORT_DIRECTION_ASC ? $findCityDto->sortDirection : static::SORT_DIRECTION_DESC;
        $sortField = $findCityDto->sortField ?? static::DEFAULT_SORT_FIELD;

        return $query->orderBy($sortField, $sortDirection);
    }

    /**
     * @param Builder $query
     * @param string $key
     * @param mixed $value
     *
     * @return Builder
     */
    protected function applyCondition(Builder $query, string $key, mixed $value): Builder
    {
        return match ($key) {
            'name' => $query->where('name', 'LIKE', $value . '%'),
            'state' => $query->where('name', $value),
            'description' => $query->where('name', 'LIKE', $value . '%'),
            'birthdate' => $query->whereBetween('birthdate', $value),
            'population' => $query->whereBetween('population', $value),
            'salary' => $query->whereBetween('salary_avg', $value),
            'timezone' => $query->where('timezone', $value),
            default => $query,
        };
    }
}
