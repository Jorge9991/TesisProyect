<?php

namespace App\Http\Controllers;

use App\Mail\AprobadoInformeMailable;
use App\Mail\AprobadoMailable;
use App\Mail\DesaprobadoInformeMailable;
use App\Mail\InformeMailable;
use App\Mail\NotificacionMailable;
use App\Models\Asignacion;
use App\Models\InformeFinal;
use App\Models\Postulation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InformeFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $informefinal = InformeFinal::where('id_estudiante', '=', $user)->first();
        return view('informe.index', compact('informefinal'));
    }
    public function informe()
    {
        $user = Auth::user()->id;
        $informefinales = InformeFinal::where('id_tutor', '=', $user)->get();
        return view('informe.informes', compact('informefinales'));
    }
    public function opcion($informeFinal)
    {
        $informefinal = InformeFinal::where('id', '=', $informeFinal)->first();
        return view('informe.show', compact('informefinal'));
    }
    public function aprobar(InformeFinal $informefinal,Request $request)
    {
        $request->validate([
            'fecha'=> 'required',
        ]);
        $correoegresado = User::where('id', '=', $informefinal->id_estudiante)->first();
        $correogestor = User::where('tipo_usuario','=','1')->first();
        $informefinal->update([
            'fecha' => $request->fecha,
            'observaciones' => $request->observacion,
            'estado' => '2', // estado de  aprobada
        ]);

        $correo = new AprobadoInformeMailable($correoegresado);
        Mail::to($correoegresado->email)->send($correo);

        $correo2 = new NotificacionMailable($correoegresado,$informefinal);
        Mail::to($correogestor)->send($correo2);
       
        return redirect()->route('informe.opcion', $informefinal)->with('info', 'Los formatos han sido aprobados');
    }
    public function noaprobar(InformeFinal $informefinal,Request $request)
    {
        $correoegresado = User::where('id', '=', $informefinal->id_estudiante)->first();
        
        $informefinal->update([
            'observaciones' => $request->observacion,
            'estado' => '3', // estado de no aprobada
        ]);
        $correo = new DesaprobadoInformeMailable($correoegresado);
        Mail::to($correoegresado->email)->send($correo);
        return redirect()->route('informe.opcion', $informefinal)->with('info', 'Los formatos no han sido aprobados');
    }
    public function cancelar(InformeFinal $informefinal)
    {
        $informefinal->update([
            'estado' => '1', // estado de revicion
        ]);
        return redirect()->route('informe.opcion', $informefinal)->with('info', 'Cancelado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $asignaciones = Asignacion::where('id_estudiante', '=', $user->id)->where('estado', '=', '2')->first();
        $informefinal = InformeFinal::where('id_estudiante', '=', $user->id)->first();
        $correodocente = User::where('id', '=', $asignaciones->id_docente)->first();
        $request->validate([
            'link' => 'required',
        ]);



        if ($request->opcion == 'crear') {
            InformeFinal::create([
                'link' => $request->link,
                'id_estudiante' => $user->id,
                'estado' => '1', //1 estado de revision --2 estado de aprobacion --3 estado de correcion --4 estado de correcion enviada --5 aprobado por gestor
                'id_tutor' => $asignaciones->id_docente
            ]);
            $correo = new InformeMailable($user);
            Mail::to($correodocente->email)->send($correo);
            return redirect()->route('informe.index')->with('info', 'Registrado sastifactoriamente');
        }
        if ($request->opcion == 'editar') {
            $informefinal->update([
                'link' => $request->link,
            ]);
            return redirect()->route('informe.index')->with('info', 'Actualizado sastifactoriamente');
        }
        if ($request->opcion == 'correcion') {
            $informefinal->update([
                'link' => $request->link,
                'estado' => '4', // estado de correcion enviada
            ]);
            return redirect()->route('informe.index')->with('info', 'Correción enviada');
        }
    }

    public function revision()
    {
        $informefinales = InformeFinal::where('estado', '=', '2')->orwhere('estado', '=', '5')->get();
        return view('informe.revision', compact('informefinales'));
    }

    public function revision_detalle(InformeFinal $informefinal)
    {
        return view('informe.detalle', compact('informefinal'));
    }
    public function aprobado(InformeFinal $informefinal,Request $request)
    {
        $correoegresado = User::where('id', '=', $informefinal->id_estudiante)->first();
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',
            'observacion' => 'required',
        ]);
        $correo = new AprobadoMailable($request->all(),$informefinal);
        Mail::to($correoegresado->email)->send($correo);
        $informefinal->update([
            'estado' => '5', // aprobado por el gestor
        ]);
        return view('informe.detalle', compact('informefinal'));
    }

}
