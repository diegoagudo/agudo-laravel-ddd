<?php

declare(strict_types=1);

namespace App\City\Domain\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AbstractResponse extends JsonResponse
{
    /**
     * @param mixed $data
     * @param int $status
     * @param array $headers
     * @param int $options
     */
    public function __construct(mixed $data = null, int $status = 200, array $headers = [], int $options = 0)
    {
        $this->data = $data;
        parent::__construct([], $status, $headers, $options);
    }

    /**
     * @param mixed $data
     * @param [type] $status
     *
     * @return self
     */
    public function success(mixed $data = null, int $status = Response::HTTP_OK): self
    {
        if ($data || $status !== Response::HTTP_NO_CONTENT) {
            $this->setData([
                'data' => $data,
                'status' => 'success',
            ]);
        }
        $this->setStatusCode($status);

        return $this;
    }

    /**
     * @param mixed $data
     * @param [type] $status
     *
     * @return self
     */
    public function error(mixed $data = null, int $status = Response::HTTP_UNPROCESSABLE_ENTITY): self
    {
        $this->setData([
            'errors' => [
                [
                    'message' => $data,
                ],
            ],
            'message' => $data,
            'status' => 'error',
        ]);

        $this->setStatusCode($status);

        return $this;
    }
}
