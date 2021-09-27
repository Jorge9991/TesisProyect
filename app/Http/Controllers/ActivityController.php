<?php

namespace App\Http\Controllers;

use App\Mail\ActividadActualizadaMailable;
use App\Mail\ActividadCreadaMailable;
use App\Models\Activity;
use App\Models\Asignacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $actividades = Activity::where('id_tutor','=',$user->id)->get();
        return view('activity.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $asignaciones = Asignacion::groupBy('id_convenio')->where('id_docente','=',$user->id)->where('estado','=','2')->get(['id_convenio']);
        return view('activity.create', compact('asignaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $estudiantes = Asignacion::where('id_convenio', '=', $request->id_asignacion)->get();
        $user = Auth::user();
        $request->validate([
            'descripcion'=> 'required',
            'fecha'=> 'required',
            'descripcion_visita'=> 'required',
            'id_asignacion'=> 'required',
        ]);
        Activity::create([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'descripcion_visita' => $request->descripcion_visita, 
            'id_asignacion' => $request->id_asignacion,
            'id_tutor' => $user->id,
            'estado' => '1'
        ]);
        foreach($estudiantes as $estudiante){
            $correo = User::where('id', '=', $estudiante->id_estudiante)->first();
            $email = $correo->email;
            $correo = new ActividadCreadaMailable($request->all(),$user);
            Mail::to($email)->send($correo);
        }
        return redirect()->route('activity.index')->with('info', 'La actividad se creo sastifactoriamente');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $user = Auth::user();
        $asignaciones = Asignacion::groupBy('id_convenio')->where('id_docente','=',$user->id)->where('estado','=','2')->get(['id_convenio']);
        
        return view('activity.edit', compact('activity','asignaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $user = Auth::user();
        $estudiantes = Asignacion::where('id_convenio', '=', $request->id_asignacion)->get();
        $request->validate([
            'recurso'=> 'required',
            'fecha'=> 'required',
            'descripcion_visita'=> 'required',
            'descripcion'=> 'required',
        ]);
        $activity->recurso = $request->recurso;
        $activity->estado = '2';
        $activity->fecha = $request->fecha;
        $activity->descripcion_visita = $request->descripcion_visita;
        $activity->descripcion = $request->descripcion;
        $activity->save();
        foreach($estudiantes as $estudiante){
            $correo = User::where('id', '=', $estudiante->id_estudiante)->first();
            //$correo->email
         $correo = new ActividadActualizadaMailable($activity,$user);
         Mail::to($correo->email)->send($correo);
        }
        return redirect()->route('activity.edit', $activity)->with('info', 'Se actualizó sastifactoriamente');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activity.index')->with('info', 'La actividad se elimino con éxito');
    
    }
}
