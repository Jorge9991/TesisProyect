<?php

namespace Database\Factories;

use App\Models\Oferta;
use App\Models\Postulation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postulation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estado' => '2',
            'id_estudiante' => User::all()->where('tipo_usuario','=','0')->random(),   //
            'id_oferta' => Oferta::all()->random(),
        ];
    }
}
