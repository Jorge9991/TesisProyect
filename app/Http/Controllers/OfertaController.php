<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user()->name;
        $ofertas = Oferta::all();
        return view('oferta.index', compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convenios = Convenio::all();
        return view('oferta.create', compact('convenios'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'horas_diarias'=> 'required',
            'horas_inicio'=> 'required',
            'horas_fin'=> 'required',
            'fecha_inicio'=> 'required',
            'cupos'=> 'required',
            'id_convenio'=> 'required',
        ]);
        $oferta = new Oferta();
        $oferta->horas_diarias = $request->horas_diarias;
        $oferta->horas_inicio = $request->horas_inicio;
        $oferta->horas_fin = $request->horas_fin;
        $oferta->fecha_inicio = $request->fecha_inicio;
        $oferta->cupos = $request->cupos;
        $oferta->id_convenio = $request->id_convenio;
        $oferta->save();
        return redirect()->route('tutor.oferta_cupo.index')->with('info', 'La oferta se creo correctamente');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function show(Oferta $oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function edit(Oferta $oferta_cupo)
    {
        $convenios = Convenio::all();
        return view('oferta.edit', compact('oferta_cupo','convenios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oferta $oferta_cupo)
    {
        $request->validate([
            'horas_diarias'=> 'required',
            'horas_inicio'=> 'required',
            'horas_fin'=> 'required',
            'fecha_inicio'=> 'required',
            'cupos'=> 'required',
            'id_convenio'=> 'required',
        ]);
        $oferta_cupo->horas_diarias = $request->horas_diarias;
        $oferta_cupo->horas_inicio = $request->horas_inicio;
        $oferta_cupo->horas_fin = $request->horas_fin;
        $oferta_cupo->fecha_inicio = $request->fecha_inicio;
        $oferta_cupo->cupos = $request->cupos;
        $oferta_cupo->id_convenio = $request->id_convenio;
        $oferta_cupo->save();
        return redirect()->route('tutor.oferta_cupo.edit', $oferta_cupo)->with('info', 'La oferta se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oferta $oferta_cupo)
    {
        $oferta_cupo->delete();
        return redirect()->route('tutor.oferta_cupo.index')->with('info', 'La Oferta se elimino con éxito');
   
    }
}
