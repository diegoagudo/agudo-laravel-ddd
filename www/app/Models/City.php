<?php

declare(strict_types=1);

namespace App\Models;

use App\City\Domain\Interfaces\CityEntity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model implements CityEntity
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'population',
        'birthdate',
        'salary_avg',
        'timezone',
        'state',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'name' => 'string',
            'description' => 'string',
            'population' => 'integer',
            'birthdate' => 'datetime',
            'salary_avg' => 'float',
            'timezone' => 'string',
            'state' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }

    public function setPopulation(int $populationQty): self
    {
        $this->population = $populationQty;

        return $this;
    }

    public function getBirthdate(): Carbon
    {
        return $this->birthdate;
    }

    public function setBirthdate(Carbon $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getSalaryAvg(): float
    {
        return $this->salary_avg;
    }

    public function setSalaryAvg(float $salaryAvg): self
    {
        $this->salary_avg = $salaryAvg;

        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }
    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }
}
