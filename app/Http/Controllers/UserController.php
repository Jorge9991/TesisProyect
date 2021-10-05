<?php

namespace App\Http\Controllers;

use App\Mail\CredencialesMailable;
use App\Mail\CredencialesUserMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name'=> 'required',
            'cedula'=> 'required',
            'tipo_usuario'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required|min:8',
        ]);
        User::create([
            'name' => $request->name,
            'cedula' => $request->cedula,
            'tipo_usuario' => $request->tipo_usuario, 
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $correo = new CredencialesUserMailable($request->all());
        Mail::to($request->email)->send($correo);
        return redirect()->route('user.index')->with('info', 'El Usuario se creo sastifactoriamente');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=> 'required',
            'cedula'=> 'required',
            'tipo_usuario'=> 'required',
            'email'=> 'required|unique:users',
        ]);
        $user->update([
            'name' => $request->name,
            'cedula' => $request->cedula,
            'tipo_usuario' => $request->tipo_usuario, 
            'email' => $request->email,
        ]);
        return redirect()->route('user.edit',$user)->with('info', 'El Usuario se actualizo sastifactoriamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('info', 'El Usuario se elimino con éxito');
    
    }
}
