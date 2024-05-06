<?php

declare(strict_types=1);

namespace App\City\Domain\Responses;

use Illuminate\Http\Response;

class CityResponse extends AbstractResponse
{
    /**
     * @param mixed $data
     * @param int $status
     * @param array $headers
     * @param int $options
     */
    public function __construct(
        mixed $data = null,
        int $status = Response::HTTP_OK,
        array $headers = [],
        int $options = 0
    ) {
        parent::__construct($data, $status, $headers, $options);
    }
}
