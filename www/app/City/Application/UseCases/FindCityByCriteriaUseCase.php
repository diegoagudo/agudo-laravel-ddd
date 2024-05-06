<?php

declare(strict_types=1);

namespace App\City\Application\UseCases;

use App\City\Application\Repositories\CityRepository;
use App\City\Domain\DataTransferObjects\FindCityDto;
use App\City\Domain\Exceptions\ContentNotFoundException;
use App\City\Domain\Responses\CityResponse;
use App\City\Domain\Responses\FindCityResourceResponse;
use Illuminate\Http\Response;
use InvalidArgumentException;
use Throwable;

final class FindCityByCriteriaUseCase
{
    /**
     * @param CityRepository $cityRepository
     * @param CityResponse $createCityResponse
     */
    public function __construct(private CityRepository $cityRepository, private CityResponse $cityResponse)
    {
    }

    /**
     * @param CreateCityDto $cityDto
     *
     * @return CityResponse|FindCityResourceResponse
     */
    public function execute(FindCityDto $findCityDto): CityResponse|FindCityResourceResponse
    {
        try {
            $listCities = $this->cityRepository->findByCriteria($findCityDto);

            if ($listCities->isEmpty()) {
                throw new ContentNotFoundException('Content not found. Please, change your filter and try again.', Response::HTTP_NOT_FOUND);
            }

            return new FindCityResourceResponse($listCities);
        } catch (InvalidArgumentException $e) {
            return $this->cityResponse->error(
                data: $e->getMessage(),
                status: Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        } catch (Throwable $e) {
            return $this->cityResponse->error(
                data: $e->getMessage(),
                status: $e->getCode() ?? Response::HTTP_INTERNAL_SERVER_ERROR,
            );
        }
    }
}
