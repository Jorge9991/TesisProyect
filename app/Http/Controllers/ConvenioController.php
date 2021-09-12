<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user()->name;
        $convenios = Convenio::all();

        return view('convenio.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('convenio.create');  
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
            'entidad_receptora'=> 'required',
            'tipologia_empresa'=> 'required',
            'avance'=> 'required',
            'fecha_firma'=> 'required',
            'fecha_finalizacion'=> 'required',
            'numero_convenio'=> 'required',
            'aprobacion_zonal'=> 'required',
            'email'=> 'required',
        ]);

        $convenio = new Convenio();
        $convenio->entidad_receptora = $request->entidad_receptora;
        $convenio->tipologia_empresa = $request->tipologia_empresa;
        $convenio->avance = $request->avance;
        $convenio->fecha_firma = $request->fecha_firma;
        $convenio->fecha_finalizacion = $request->fecha_finalizacion;
        $convenio->numero_convenio = $request->numero_convenio;
        $convenio->aprobacion_zonal = $request->aprobacion_zonal;
        $convenio->email = $request->email;
        $convenio->save();

        User::create([
            'name' => $request->entidad_receptora,
            'cedula' => '0000000000',
            'tipo_usuario' => '2', 
            'email' => $request->email,
            'password' => bcrypt($request->entidad_receptora)
        ]);

        return redirect()->route('tutor.convenio.index')->with('info', 'El convenio se creo sastifactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        return view('convenio.edit', compact('convenio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio)
    {
        $request->validate([
            'entidad_receptora'=> 'required',
            'tipologia_empresa'=> 'required',
            'avance'=> 'required',
            'fecha_firma'=> 'required',
            'fecha_finalizacion'=> 'required',
            'numero_convenio'=> 'required',
            'aprobacion_zonal'=> 'required',
            'email'=> 'required',
        ]);

        $convenio->entidad_receptora = $request->entidad_receptora;
        $convenio->tipologia_empresa = $request->tipologia_empresa;
        $convenio->avance = $request->avance;
        $convenio->fecha_firma = $request->fecha_firma;
        $convenio->fecha_finalizacion = $request->fecha_finalizacion;
        $convenio->numero_convenio = $request->numero_convenio;
        $convenio->aprobacion_zonal = $request->aprobacion_zonal;
        $convenio->email = $request->email;
        $convenio->save();
        return redirect()->route('tutor.convenio.edit', $convenio)->with('info', 'El convenio se actualizó sastifactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenio $convenio)
    {
        $convenio->delete();
        return redirect()->route('tutor.convenio.index')->with('info', 'El Convenio se elimino con éxito');
    }
}
