<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Support\Facades\DB;
use App\Model\Categoria;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticado');
        $this->middleware('autorizado', ['only' => ['index','show']]);
        $this->middleware('administrador', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $categorias = Categoria::all();
           return view('categorias.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias/create');
    }
    /**

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaRequest $request)
    {   
        $data = request()->all();
        Categoria::create([
            'nombre' => $data['nombreCategoria'],
            'estado' => $data['estado'],
            'estado_eliminado' => false
        ]);
        return redirect()->route('categorias.index')->with('mensaje','La categoria se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)  //$id
    {
        //$categoria = Categoria::find($id);
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //buscar el dato
        $categoria_edit =Categoria::findOrFail($id);
        //['categoria' => $categoria]
        $categorias = Categoria::all();
        return view('categorias.index', compact('categoria_edit','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $data = request()->all();
        $categoria->nombre = $data['nombreCategoria'];
        if($data['estado'] == 1){
            $categoria->estado = true;
        }else{
            $categoria->estado = false;
        }
        $categoria->update();
        return redirect()->route('categorias.index')->with('mensaje','La categoria a sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria){
        //cambiar estado a oculto para siempre para el eliminar
    }
    public function eliminar(Categoria $categoria){
        $categoria->estado_eliminado = true;
        $categoria->update();
        return redirect()->route('categorias.index')->with('mensaje','La categoria a sido eliminada correctamente');
    }
}
