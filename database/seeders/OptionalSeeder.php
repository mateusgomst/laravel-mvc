<?php

namespace Database\Seeders;

use App\Models\Optional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            ['name' => 'AR CONDICIONADO'],
            ['name' => 'ALARME'],
            ['name' => 'AIRBAG'],
            ['name' => 'TETO SOLAR'],
            ['name' => 'CÂMERA DE RÉ'],
            ['name' => 'SENSOR DE ESTACIONAMENTO'],
            ['name' => 'VIDRO ELÉTRICO'],
            ['name' => 'TRAVAS ELÉTRICAS'],
            ['name' => 'DIREÇÃO HIDRÁULICA'],
            ['name' => 'ABS'],
        ];
        Optional::query()->insert($list);
        //
    }
}
