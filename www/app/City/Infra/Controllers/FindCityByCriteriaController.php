<?php

declare(strict_types=1);

namespace App\City\Infra\Controllers;

use App\City\Application\UseCases\CreateCityUseCase;
use App\City\Application\UseCases\FindCityByCriteriaUseCase;
use App\City\Domain\DataTransferObjects\FindCityDto;
use App\City\Domain\Requests\CreateCityRequest;
use App\City\Domain\Requests\FindCityByCriteriaRequest;
use App\City\Domain\Responses\CityResponse;
use App\City\Domain\Responses\FindCityResourceResponse;
use Illuminate\Routing\Controller;

class FindCityByCriteriaController extends Controller
{
    /** @param CreateCityUseCase $createCityUseCase */
    public function __construct(private FindCityByCriteriaUseCase $findCityByCriteriaUseCase)
    {
    }

    /**
     * @param CreateCityRequest $cityCreateRequest
     *
     * @return CityResponse
     */
    public function find(FindCityByCriteriaRequest $findCityByCriteriaRequest): CityResponse|FindCityResourceResponse
    {
        $findCityDto = new FindCityDto(
            name: $findCityByCriteriaRequest->input('name'),
            description: $findCityByCriteriaRequest->input('description'),
            state: $findCityByCriteriaRequest->input('state'),
            populationInitial: $findCityByCriteriaRequest->input('populationInitial') ? (int) $findCityByCriteriaRequest->input('populationInitial') : null,
            populationEnd: $findCityByCriteriaRequest->input('populationEnd') ? (int) $findCityByCriteriaRequest->input('populationEnd') : null,
            birthdateInitial: $findCityByCriteriaRequest->input('birthdateInitial'),
            birthdateEnd: $findCityByCriteriaRequest->input('birthdateEnd'),
            salaryInitial: $findCityByCriteriaRequest->input('salaryInitial') ? (float) $findCityByCriteriaRequest->input('salaryInitial') : null,
            salaryEnd: $findCityByCriteriaRequest->input('salaryEnd') ? (float) $findCityByCriteriaRequest->input('salaryEnd') : null,
            timezone: $findCityByCriteriaRequest->input('timezone'),
            sortField: $findCityByCriteriaRequest->input('sortField'),
            sortDirection: $findCityByCriteriaRequest->input('sortDirection'),
        );

        return $this->findCityByCriteriaUseCase->execute($findCityDto);
    }
}
