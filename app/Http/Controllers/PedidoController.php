<?php

namespace App\Http\Controllers;

use App\Model\Pedido;
use App\Model\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $pivot = array();
        foreach ($pedidos as $i => $pedido) {
            $productos = $pedido->productos;
            foreach ($productos as $j => $producto) {
                $pivot[$pedido->pedido_id][$j] = ['cantidad' => $producto->pivot->cantidad, 'subtotal' => $producto->pivot->subtotal];
                
            }
            
        }
        $datos_pivot = Collection::make($pivot);
        return view('pedidos.index',compact('pedidos', 'datos_pivot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        if ($request->ajax()) {
            $mesa_id = $request->pedido['mesa_id'];
            $total = $request->pedido['total'];
            $pedido = new Pedido(['total' => $total, 'users_id' => $mesa_id]);
            $pedido->save();
            $productos = $request->pedido['productos']; 
            foreach ($productos as $producto) {
                $pedido->productos()->attach($producto['id'], ['pedido_id' => $pedido->pedido_id ,'cantidad' => $producto['cantidad'], 'subtotal' => $producto['subtotal']]);
            }            
            return response()->json([
                "mensaje1" => "Realizando orden…",
                "mensaje2" => "Orden Completa Gracias."
            ]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
