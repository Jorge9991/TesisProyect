<?php

namespace Database\Seeders;

use App\Models\Oferta;
use Illuminate\Database\Seeder;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Oferta::create([
            'horas_diarias' => '6',
            'horas_inicio' => '08:00:00',
            'horas_fin' => '15:00:00', 
            'fecha_inicio' => '2021-10-01',
            'cupos' => '5',
            'id_convenio' => '1', 
        ]);
        Oferta::create([
            'horas_diarias' => '5',
            'horas_inicio' => '10:00:00',
            'horas_fin' => '17:00:00', 
            'fecha_inicio' => '2021-09-01',
            'cupos' => '5',
            'id_convenio' => '2', 
        ]);
        Oferta::create([
            'horas_diarias' => '8',
            'horas_inicio' => '06:00:00',
            'horas_fin' => '13:00:00', 
            'fecha_inicio' => '2021-11-01',
            'cupos' => '5',
            'id_convenio' => '3', 
        ]);

    }
}
