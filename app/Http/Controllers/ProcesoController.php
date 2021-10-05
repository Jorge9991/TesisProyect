<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Asignacion;
use App\Models\Information;
use App\Models\InformeFinal;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    public function index()
    {
        // $user = Auth::user()->name;
        $users = User::where('tipo_usuario','=','0')->get();

        return view('proceso.index', compact('users'));
    }
    public function proceso_estudiante(User $user)
    {
        $total = 0;
        $informaciones = Information::where('id_estudiante', '=', $user->id)->get();
        foreach ($informaciones as $information) {
            $fecha1 = new DateTime($information->horas_inicio); //fecha inicial
            $fecha2 = new DateTime($information->horas_fin); //fecha de cierre
            $intervalo = $fecha1->diff($fecha2);
            $totalhoras =  $intervalo->format('%H'); //00 años 0 meses 0 días 08 horas 0 minutos 0 segundos
            $total = $totalhoras + $total;
        }
        $link = InformeFinal::where('id_estudiante','=',$user->id)->first();
        $tutor = Asignacion::where('id_estudiante','=',$user->id)->first();
        if(is_object($tutor)) {
            $visitas = Activity::where('id_convenio','=',$tutor->id_convenio)->get();
            return view('proceso.proceso', compact('user','tutor','visitas','total','link'));
        }else{
            $visitas = false;
            return view('proceso.proceso', compact('user','tutor','total','link','visitas'));
        }

        
    }
}
