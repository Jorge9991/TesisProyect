<?php

namespace App\Http\Controllers;

use App\Mail\EnvioMailable;
use App\Mail\InformeTitulacionMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnvioController extends Controller
{
    public function index()
    {
        // $user = Auth::user()->name;
        $users = User::where('tipo_usuario', '=', '3')->get();

        return view('asignaciontutor.index', compact('users'));
    }

    public function envio(User $user)
    {

        return view('asignaciontutor.envio', compact('user'));
    }
    public function enviocorreo(Request $request, User $user)
    {
        $archivo = $request->file('file');
        $correo = new EnvioMailable($archivo,$user);
        Mail::to($user->email)->send($correo);
        return redirect()->route('tutor_envio.index')->with('info', 'La asignación fue enviada');
   
    }

    public function enviocorreotitulacion(Request $request)
    {
        $correogestor = User::where('tipo_usuario','=','5')->first();
        $archivo = $request->file('file');
        $correo = new InformeTitulacionMailable($archivo);
        Mail::to($correogestor->email)->send($correo);
        return redirect()->route('titulacion.titulacion')->with('info', 'El informe fue enviado');
    }
    
    public function titulacion()
    {
        return view('informetitulacion.envio');
    }
}
