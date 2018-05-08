<?php

namespace App\Http\Controllers;

use App\Model\Producto;
use App\Model\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::Buscar($request->get("buscar"),$request->get("criterio"))->orderby("nombre","ASC")->paginate(15);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('nombre', 'categoria_id');
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        //$path_foto = Storage::disk('public')->putFile('fotos', $request->foto);
        $path_foto = 'storage/'.$request->foto->store('fotos', 'public');//almacenando foto en directorio Public
        $producto = new Producto;
        $producto->fill($request->except(['foto']));
        $producto->foto = $path_foto;//almacenamos ruta de foto en BD
        $producto->save();
        return redirect()
            ->route('productos.index')
            ->with('mensaje', 'Se creo un nuevo Producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
