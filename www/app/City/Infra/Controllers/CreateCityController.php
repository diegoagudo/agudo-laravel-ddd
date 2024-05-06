<?php

declare(strict_types=1);

namespace App\City\Infra\Controllers;

use App\City\Application\UseCases\CreateCityUseCase;
use App\City\Domain\DataTransferObjects\CreateCityDto;
use App\City\Domain\Requests\CreateCityRequest;
use App\City\Domain\Responses\CityResponse;
use Illuminate\Routing\Controller;

class CreateCityController extends Controller
{
    /** @param CreateCityUseCase $createCityUseCase */
    public function __construct(private CreateCityUseCase $createCityUseCase)
    {
    }

    /**
     * @param CreateCityRequest $cityCreateRequest
     *
     * @return CityResponse
     */
    public function create(CreateCityRequest $cityCreateRequest): CityResponse
    {
        $cityDto = new CreateCityDto(
            name: $cityCreateRequest->input('name'),
            description: $cityCreateRequest->input('description'),
            state: $cityCreateRequest->input('state'),
            population: $cityCreateRequest->input('population'),
            birthdate: $cityCreateRequest->input('birthdate'),
            salaryAvg: $cityCreateRequest->input('salaryAvg'),
            timezone: $cityCreateRequest->input('timezone'),
        );

        return $this->createCityUseCase->execute($cityDto);
    }
}
