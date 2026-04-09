<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    public function run(): void
    {
        Season::updateOrCreate(
            ['year' => 2026],
            [
                'name' => 'Temporada 2026',
                'start_date' => '2026-01-01',
                'end_date' => '2026-12-31',
                'active' => true,
            ]
        );
    }
}