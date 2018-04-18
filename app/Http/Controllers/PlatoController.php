<?php

namespace App\Http\Controllers;

use App\Model\Plato;
use App\Model\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlatoRequest;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::all();
        return view('platos.index', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('nombre', 'id_categoria');
        return view('platos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlatoRequest $request)
    {
        $plato = new Plato;
        $plato->fill($request->validated());
        // dd($request->validated());
        $plato->save();
        return redirect()
            ->route('menu.index')
            ->with('mensaje', 'Se creo un nuevo Plato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        //
    }
}
