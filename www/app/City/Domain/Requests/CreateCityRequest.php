<?php

declare(strict_types=1);

namespace App\City\Domain\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:150',
            'description' => 'max:500',
            'state' => 'required|size:2',
            'birthdate' => 'required|date_format:Y-m-d',
            'salaryAvg' => 'required|numeric',
            'population' => 'required|integer',
            'timezone' => 'required|size:3',
        ];
    }
}
