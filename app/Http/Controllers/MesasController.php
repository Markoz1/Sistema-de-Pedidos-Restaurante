<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMesaRequest;
use App\Http\Requests\UpdateMesaRequest;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesa_id = Role::where('nombre', 'Mesa')->first()->id;
        $mesas = User::where('role_id', $mesa_id)->paginate(5);
        return view('mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMesaRequest $request)
    {
        $mesa = new User;
        $nombre = $request->nombre." ".$request->numero;
        $username = $request->nombre.$request->numero;
        $mesa->nombre = $nombre;
        $mesa->estado = $request->estado;
        $mesa->username = $username;
        $mesa->password = bcrypt($username);
        $mesa->role_id = 5;
        $mesa->save();
        return redirect()
            ->route('mesas.index')
            ->with('mensaje', 'Se creo una nueva Mesa');
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
    public function edit($id)
    {
        $mesa_id = Role::where('nombre', 'Mesa')->first()->id;
        $mesas = User::where('role_id', $mesa_id)->paginate(5);
        $mesa_edit = User::findOrFail($id);
        $mesa_edit->numero = substr($mesa_edit->nombre, 5);
        return view('mesas.index', compact('mesas', 'mesa_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMesaRequest $request, $id)
    {
        $mesa = User::findOrFail($id);
        $nombre = $request->nombre." ".$request->numero;
        $mesa->nombre = $nombre;
        $mesa->estado = $request->estado;
        $mesa->username = $request->username;
        if( $request->filled('password') ){
            $mesa->password = bcrypt($request->password);
        }
        $mesa->save();
        return redirect()
            ->route('mesas.index')
            ->with('mensaje', 'La Mesa se ha modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
