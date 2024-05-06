<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!City::count()) {
            City::factory()->count(2000)->create();
        }
    }
}
