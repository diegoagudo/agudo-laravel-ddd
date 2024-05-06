<?php

declare(strict_types=1);

namespace App\City\Domain\Responses;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FindCityResourceResponse extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($item) {
                return [
                    'name' => $item->name,
                    'state' => $item->state,
                    'description' => $item->description,
                    'birthdate' => Carbon::parse($item->birthdate)->format('Y-m-d'),
                    'population' => (int) $item->population,
                    'salary_avg' => (float) $item->salary_avg,
                    'timezone' => $item->state,
                ];
            })
        ];
    }
}
