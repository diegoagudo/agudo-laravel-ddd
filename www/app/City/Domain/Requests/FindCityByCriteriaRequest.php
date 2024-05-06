<?php

declare(strict_types=1);

namespace App\City\Domain\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindCityByCriteriaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'min:1|max:150',
            'description' => 'max:500',
            'state' => 'size:2',

            'birthdateInitial' => 'nullable|date|before_or_equal:birthdateEnd|required_with:birthdateEnd',
            'birthdateEnd' => 'nullable|date|after_or_equal:birthdateInitial|required_with:birthdateInitial',

            'salaryInitial' => 'nullable|numeric|before_or_equal:salaryEnd|required_with:salaryEnd',
            'salaryEnd' => 'nullable|numeric|after_or_equal:salaryInitial|required_with:salaryInitial',

            'populationInitial' => 'nullable|integer|before_or_equal:populationEnd|required_with:populationEnd',
            'populationEnd' => 'nullable|integer|after_or_equal:populationInitial|required_with:populationInitial',

            'timezone' => 'size:3',

            'resultPerPage' => 'integer',

            'sortField' => 'in:id,name,state,birthdate,salaryAvg,population',
            'sortDirection' => 'in:asc,desc',
        ];
    }
}
