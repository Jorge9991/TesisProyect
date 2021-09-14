<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jorge Guerrero',
            'cedula' => '0942807462',
            'tipo_usuario' => '1',    //gestor 
            'email' => 'jorgegue1999@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Luis Alejandro',
            'cedula' => '0942807461',
            'tipo_usuario' => '0',   //egresado
            'email' => 'luisale1999@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Municipio Daule',
            'cedula' => '000000000',
            'tipo_usuario' => '2',   //convenio
            'email' => 'convenio@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Municipio Santa Lucia',
            'cedula' => '000000001',
            'tipo_usuario' => '2',   //convenio
            'email' => 'convenio2@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Municipio Petrillo',
            'cedula' => '000000002',
            'tipo_usuario' => '2',   //convenio
            'email' => 'convenio3@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::factory(20)->create();

    }
}
