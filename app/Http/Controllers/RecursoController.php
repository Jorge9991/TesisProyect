<?php

namespace App\Http\Controllers;

use App\Models\InformeFinal;
use App\Models\Postulation;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos = Recurso::all();
        return view('recursos.recurso', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nombre =  $request->file('file')->getClientOriginalName();
        $request->validate([
            'file' =>'required'
        ]);
        $documentos =  $request->file('file')->store('public');
        $url = Storage::url($documentos);
        Recurso::create([
            'url' => $url,
            'proceso' => $request->proceso,
            'nombre' =>$nombre,
        ]);
        return redirect()->route('tutor.recurso.index')->with('info', 'Guardado correctamente!');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {

        return view('recursos.edit', compact('recurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurso $recurso)
    {
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurso $recurso)
    {
        unlink('.'.$recurso->url);
        $recurso->delete();
        return redirect()->route('tutor.recurso.index')->with('info', 'Eliminado con éxito');
    }

    public function descargar()
    {
        $user = Auth::user()->id;
        $codigo = Postulation::where('id_estudiante', '=', $user)->first();
        $recursos = Recurso::where('proceso', '=', '1')->get();
        $informefinal = InformeFinal::where('id_estudiante', '=', $user)->first();
        return view('recursos.recursoe', compact('recursos','codigo','informefinal'));
    }
}
