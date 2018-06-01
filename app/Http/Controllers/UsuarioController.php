<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($request);
        // $usuarios = Usuario::Buscar($request->get("busqueda"),$request->get("estado"),$request->get("categoria"))->orderby("nombre","ASC")->paginate(100);
        // $anterior   = $request;
        // $usuarios = Usuario::All();
        return view('usuarios.index');
    }

    public function usuarios()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_producto', 'producto_id', 'pedido_id')
            ->withPivot('cantidad', 'subtotal')
            ->withTimestamps();
            
    }
}
