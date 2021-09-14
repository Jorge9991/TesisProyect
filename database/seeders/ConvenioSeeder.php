<?php

namespace Database\Seeders;

use App\Models\Convenio;
use Illuminate\Database\Seeder;

class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convenio::create([
            'entidad_receptora' => 'Municipio Daule',
            'tipologia_empresa' => 'PÚBLICA',
            'avance' => 'FIRMADO', 
            'fecha_firma' => '2021-09-09',
            'fecha_finalizacion' => '2022-09-09',
            'numero_convenio' => '00111', 
            'aprobacion_zonal' => 'ACTA CAS-ITSJBA-2020-011',
            'email' => 'convenio@gmail.com',
        ]);
        Convenio::create([
            'entidad_receptora' => 'Municipio Santa Lucia',
            'tipologia_empresa' => 'PRIVADA',
            'avance' => 'FIRMADO', 
            'fecha_firma' => '2021-08-09',
            'fecha_finalizacion' => '2022-08-09',
            'numero_convenio' => '00112', 
            'aprobacion_zonal' => 'ACTA CAS-ITSJBA-2020-012',
            'email' => 'convenio2@gmail.com',
        ]);
        Convenio::create([
            'entidad_receptora' => 'Municipio Petrillo',
            'tipologia_empresa' => 'MIXTA',
            'avance' => 'FIRMADO', 
            'fecha_firma' => '2020-02-05',
            'fecha_finalizacion' => '2021-08-09',
            'numero_convenio' => '00113', 
            'aprobacion_zonal' => 'ACTA CAS-ITSJBA-2020-013',
            'email' => 'convenio3@gmail.com',
        ]);
    }
}
