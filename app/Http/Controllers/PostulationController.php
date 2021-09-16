<?php

namespace App\Http\Controllers;

use App\Mail\AprobarPostMailable;
use App\Mail\OfertasMailable;
use App\Mail\RechazarPostMailable;
use App\Models\Oferta;
use App\Models\Postulation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $mipostulacion = Postulation::where('id_estudiante','=',$id)->first();
 
        if(isset($mipostulacion)){
            $idoferta = $mipostulacion->id_oferta;
        }else{
            $idoferta = 0;          
        }
        $ofertas = Oferta::all();

         return view('oferta.indexg', compact('ofertas','idoferta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postulation  $postulation
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = Auth::user()->id;
        $mipostulacion = Postulation::where('id_estudiante','=',$id)->first();
        if(isset($mipostulacion)){
            $mipostulacion->delete();
            return redirect()->route('egresado.postulation.index')->with('info', 'Postulación cancelada');
        
        }
        
        return redirect()->route('egresado.postulation.index')->with('info', 'No tienes postulaciones por cancelar!');
            
    }


    public function postular($postulation)
    {
        $id = Auth::user()->id;
        $cupos = Oferta::where('id','=',$postulation)->first();
        $yainscripto = Postulation::where('id_estudiante','=',$id)->get();
        $postulaciones = Postulation::where('id_oferta','=',$postulation)->get();
        $correogestor = User::where('tipo_usuario','=','1')->first();


        if(count($yainscripto) < 1){
            if(count($postulaciones) < $cupos->cupos){
                Postulation::create([
                    'estado' => '1',// sin aprobar aun 
                    'id_estudiante' => $id,
                    'id_oferta' => $postulation,
                ]);
                if(count($postulaciones)+1 == $cupos->cupos){
                    $correo = new OfertasMailable($cupos);
                    Mail::to($correogestor->email)->send($correo);
                }
                return redirect()->route('egresado.postulation.index')->with('info', 'Se ha postulado correctamente!');
            }else{
                return redirect()->route('egresado.postulation.index')->with('info', 'Ya no se encuentra disponible cupos para esta oferta');
            }         
        }else{
            return redirect()->route('egresado.postulation.index')->with('info', 'Ya ha postulado anteriormente a un cupo!');
        }
    }

    public function postulaciones()
    {
        $postulaciones = Postulation::all();

        return view('oferta.postulaciones', compact('postulaciones'));
    }

    public function rechazar($postulation)
    {
        $postulation = Postulation::where('id','=',$postulation)->first();
        $postulation->delete();

        return redirect()->route('egresado.postulation.postulaciones')->with('info', 'Se há Rechazado una postulación');
        
    }
    public function aprobar($postulation)
    {
        $postulation = Postulation::where('id','=',$postulation)->first();
        return view('oferta.aprobar', compact('postulation'));
    }

    public function aprobado(Request $request, Postulation $postulation)
    {
        $request->validate([
            'codigo'=> 'required',
            'link'=> 'required',
        ]);
        $postulation->codigo = $request->codigo;
        $postulation->link = $request->link;
        $postulation->estado = '2';
        $postulation->save();

        $correoestudiante =$postulation->estudiantes->email;
        $correo = new AprobarPostMailable($postulation);
        Mail::to($correoestudiante)->send($correo);

        return redirect()->route('egresado.postulation.postulaciones')->with('info', 'Se há Aprobado una postulación');
       
    }

    public function cancelar_postulacion($postulation){

        $postulation = Postulation::where('id','=',$postulation)->first();
        $postulation->estado = '1';
        $postulation->save();

        $correoestudiante =$postulation->estudiantes->email;
        $correo = new RechazarPostMailable($postulation);
        Mail::to($correoestudiante)->send($correo);

        return redirect()->route('egresado.postulation.postulaciones')->with('info', 'Se há Cancelado una postulación');
        
    }
}
