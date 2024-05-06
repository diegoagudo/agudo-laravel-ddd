<?php

declare(strict_types=1);

namespace App\City\Application\UseCases;

use App\City\Application\Repositories\CityRepository;
use App\City\Domain\City;
use App\City\Domain\DataTransferObjects\CreateCityDto;
use App\City\Domain\Responses\CityResponse;
use Illuminate\Http\Response;
use InvalidArgumentException;
use Throwable;

final class CreateCityUseCase
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
     * @return CityResponse
     */
    public function execute(CreateCityDto $cityDto): CityResponse
    {
        try {
            $city = City::create($cityDto);

            $this->cityRepository->save($city);

            return $this->cityResponse->success(
                status: Response::HTTP_NO_CONTENT,
            );
        } catch (InvalidArgumentException $e) {
            return $this->cityResponse->error(
                data: $e->getMessage(),
                status: Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        } catch (Throwable $e) {
            return $this->cityResponse->error(
                data: $e->getMessage(),
                status: Response::HTTP_INTERNAL_SERVER_ERROR,
            );
        }
    }
}
