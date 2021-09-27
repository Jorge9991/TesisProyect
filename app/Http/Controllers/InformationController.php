<?php

namespace App\Http\Controllers;

use App\Models\Information;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        $user = Auth::user()->id;
        $informaciones = Information::where('id_estudiante', '=', $user)->get();
        foreach ($informaciones as $information) {
            $fecha1 = new DateTime($information->horas_inicio); //fecha inicial
            $fecha2 = new DateTime($information->horas_fin); //fecha de cierre
            $intervalo = $fecha1->diff($fecha2);
            $totalhoras =  $intervalo->format('%H'); //00 años 0 meses 0 días 08 horas 0 minutos 0 segundos
            $total = $totalhoras + $total;
        }


        return view('informacion.index', compact('informaciones', 'user', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informacion.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $request->validate([
            'fecha'=> 'required',
            'horas_inicio'=> 'required',
            'horas_fin'=> 'required',
            'semana'=> 'required',
            'dia'=> 'required',
            'descripcion'=> 'required|max:180',
        ]);

        Information::create([
            'fecha' => $request->fecha,
            'horas_inicio' => $request->horas_inicio,
            'horas_fin' => $request->horas_fin,
            'descripcion' => $request->descripcion,
            'semana' => $request->semana,
            'dia' => $request->dia,
            'id_estudiante' => $user,
        ]);
        return redirect()->route('information.index')->with('info', 'La información se registro correctamente');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('informacion.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'fecha'=> 'required',
            'horas_inicio'=> 'required',
            'horas_fin'=> 'required',
            'semana'=> 'required',
            'dia'=> 'required',
            'descripcion'=> 'required|max:200',
        ]);
        $information->update([
            'fecha' => $request->fecha,
            'horas_inicio' => $request->horas_inicio,
            'horas_fin' => $request->horas_fin,
            'descripcion' => $request->descripcion,
            'semana' => $request->semana,
            'dia' => $request->dia,
        ]);
        return redirect()->route('information.edit', $information)->with('info', 'La información se actualizó sastifactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $information->delete();
        return redirect()->route('information.index')->with('info', 'La información se elimino con éxito');
   
    }
}
