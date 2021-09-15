<?php

namespace App\Http\Controllers;

use App\Mail\OfertasMailable;
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
}
