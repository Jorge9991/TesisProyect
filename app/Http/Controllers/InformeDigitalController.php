<?php

namespace App\Http\Controllers;

use App\Mail\InformeDigitalMailable;
use App\Models\Asignacion;
use App\Models\InformeDigital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InformeDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $informe = InformeDigital::where('id_estudiante','=',$user)->first();
        return view('informedigital.index', compact('informe'));
    }

    public function create(Request $request)
    {
        $user = Auth::user()->id;
        $usuario = Auth::user();
        $asignaciones = Asignacion::where('id_estudiante', '=', $user)->where('estado', '=', '2')->first();
        $correodocente = User::where('id', '=', $asignaciones->id_docente)->first();

        $request->validate([
            'link'=> 'required',
        ]);
        if($request->opcion == 'crear'){

            InformeDigital::create([
                'link' => $request->link,
                'id_estudiante' => $user,
            ]);
            $correo = new InformeDigitalMailable($usuario);
            Mail::to($correodocente->email)->send($correo);
            return redirect()->route('informedigital.index')->with('info', 'El link se registro sastifactoriamente');
       
        }
        if($request->opcion == 'actualizar'){
            $informe = InformeDigital::where('id_estudiante','=',$user)->first();
            $informe->update([
                'link' => $request->link,
            ]);
            return redirect()->route('informedigital.index')->with('info', 'El link se actualizo sastifactoriamente');   
        }


    }

    public function indexgestor()
    {
        $informes = InformeDigital::all();
        return view('informedigital.indexgestor', compact('informes'));
    }

}
