<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jorge Luis Guerrero Alejandro',
            'cedula' => '0942807462',
            'tipo_usuario' => '1', 
            'email' => 'jorgegue1999@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
