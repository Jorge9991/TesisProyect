<?php

namespace Database\Seeders;

use App\Models\Postulation;
use Illuminate\Database\Seeder;

class PostulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postulation::factory(10)->create();
    }
}
