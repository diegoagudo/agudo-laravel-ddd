<?php

declare(strict_types=1);

namespace App\Providers;

use App\City\Application\Repositories\CityRepository;
use App\City\Domain\Interfaces\CityEntity;
use App\City\Infra\Repositories\CityRepositoryDatabase;
use App\Models\City;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->bindEntities();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }

    protected function bindEntities(): void
    {
        $this->app->bind(
            CityEntity::class,
            City::class,
        );

        $this->app->bind(
            CityRepository::class,
            CityRepositoryDatabase::class,
        );
    }
}
