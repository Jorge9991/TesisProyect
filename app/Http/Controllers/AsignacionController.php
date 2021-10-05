<?php

namespace App\Http\Controllers;

use App\Mail\AceptarAsignacionMailable;
use App\Mail\AsignacionMailable;
use App\Mail\RechazarAsignacionMailable;
use App\Mail\TutorMailable;
use App\Models\Asignacion;
use App\Models\Convenio;
use App\Models\Postulation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user()->name;
        $postulaciones = Postulation::groupBy('id_oferta')->where('estado', '=', '2')->get(['id_oferta']);
        // $docentes = User::where('tipo_usuario','=','3')->get();

        return view('asignacion.index', compact('postulaciones'));
    }

    public function asignar($postulacion)
    {
        $postulation = Postulation::where('id_oferta', '=', $postulacion)->first();
        $docentes = User::where('tipo_usuario','=','3')->get();
        $postulaciones = Postulation::where('id_oferta', '=', $postulacion)->where('estado', '=', '2')->get();
        
        $asignado = Asignacion::where('id_convenio', '=', $postulacion)->first();
        return view('asignacion.asignar', compact('postulaciones','docentes','postulation','postulacion','asignado'));
    }
    public function asignar_tutor( $postulacion,Request $request)
    {
        $postulaciones = Postulation::where('id_oferta', '=', $postulacion)->where('estado', '=', '2')->get();
        
        if($request->opcion == 'asignar'){
            foreach($postulaciones as $estudiante){

                Asignacion::create([
                    'estado' => '1',
                    'id_estudiante' => $estudiante->id_estudiante,
                    'id_docente' => $request->id_docente, 
                    'id_convenio' => $postulacion,
                ]);
            }
          
        }
        $asignaciones = Asignacion::where('id_convenio', '=', $postulacion)->get();
        if($request->opcion == 'actualizar'){
            foreach($asignaciones as $asignacion){
                $asignacion->id_docente = $request->id_docente;
                $asignacion->save();
            }
          
        }
         // nombre del convenio
         $postulation = Postulation::where('id_oferta', '=', $postulacion)->first();
         //el usuario que le llegara
         $docente = User::where('id', '=', $request->id_docente)->first();
 
         $correo = new AsignacionMailable($postulation,$docente,$postulaciones);
         Mail::to($docente->email)->send($correo);

        return redirect()->route('asignacion.index')->with('info', 'Asignado');
    }

    public function asignaciontutor()
    {
         $user = Auth::user()->id;
         $asignaciones = Asignacion::groupBy('id_convenio')->groupBy('estado')->where('id_docente', '=', $user)->get(['id_convenio','estado']);
         return view('asignacion.aceptar_asignacion', compact('asignaciones'));
    }

    public function detalle(Convenio $asignacion)
    {
         $user = Auth::user()->id;

         $asignaciones = Asignacion::where('id_convenio', '=', $asignacion->id)->where('id_docente', '=', $user)->get();
       
         $asignation = $asignacion;
         return view('asignacion.detalle', compact('asignaciones','asignacion','asignation'));
       
    }

    public function aceptar_asignacion(Convenio $asignation)
    {
        $user = Auth::user()->id;
        $docente = Auth::user()->name;
        $correogestor = User::where('tipo_usuario','=','1')->first();
        $asignaciones = Asignacion::where('id_convenio', '=', $asignation->id)->where('id_docente', '=', $user)->get();
        foreach($asignaciones as $asignacion){
            $asignacion->estado = '2'; // 2 = a aceptado la asignacion
            $asignacion->save();
        }
        // $archivo = $request->file('file');
        $correo = new AceptarAsignacionMailable($docente,$asignation);
        Mail::to($correogestor->email)->send($correo);

        foreach($asignaciones as $asignacion){
            $email = $asignacion->estudiantes->email;
            $correo = new TutorMailable($docente);
            Mail::to($email)->send($correo); 
        }


        return redirect()->route('asignacion.asignaciontutor')->with('info', 'Usted ha aceptado la Asignación');
    
    }

    public function rechazar_asignacion(Convenio $asignation,Request $request)
    {
        
        $user = Auth::user()->id;
        $correogestor = User::where('tipo_usuario','=','1')->first();
        $docente = Auth::user()->name;
        $asignaciones = Asignacion::where('id_convenio', '=', $asignation->id)->where('id_docente', '=', $user)->get();
        $observacion = $request->observacion;
        $correo = new RechazarAsignacionMailable($observacion,$docente,$asignation);
        Mail::to($correogestor->email)->send($correo);


        foreach($asignaciones as $asignacion){
            $asignacion->delete();
        }
      return redirect()->route('asignacion.asignaciontutor')->with('info', 'Asignación rechazada correctamente');

    }
}
