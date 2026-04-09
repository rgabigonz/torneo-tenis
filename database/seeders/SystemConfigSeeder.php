<?php

namespace Database\Seeders;

use App\Models\SystemConfig;
use Illuminate\Database\Seeder;

class SystemConfigSeeder extends Seeder
{
    public function run(): void
    {
        $configs = [
            [
                'config_key' => 'regular_win_points',
                'config_value' => '3',
                'description' => 'Puntos por partido ganado en fase regular',
            ],
            [
                'config_key' => 'regular_loss_points',
                'config_value' => '1',
                'description' => 'Puntos por partido perdido en fase regular',
            ],
            [
                'config_key' => 'walkover_points_winner',
                'config_value' => '3',
                'description' => 'Puntos para ganador por WO',
            ],
            [
                'config_key' => 'walkover_points_loser',
                'config_value' => '0',
                'description' => 'Puntos para perdedor por WO',
            ],
            [
                'config_key' => 'qualified_players_count',
                'config_value' => '4',
                'description' => 'Cantidad de clasificados a semifinales',
            ],
            [
                'config_key' => 'master_players_count',
                'config_value' => '8',
                'description' => 'Cantidad de jugadores clasificados al Master',
            ],
            [
                'config_key' => 'match_format',
                'config_value' => '1_set_super_tiebreak_on_6_6',
                'description' => 'Formato del partido',
            ],
        ];

        foreach ($configs as $config) {
            SystemConfig::updateOrCreate(
                ['config_key' => $config['config_key']],
                $config
            );
        }
    }
}