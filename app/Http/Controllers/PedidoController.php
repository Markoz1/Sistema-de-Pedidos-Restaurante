<?php

namespace App\Http\Controllers;

use App\Model\Pedido;
use App\Model\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
        //dd($datos_pivot);
        return view('pedidos.index',compact('pedidos', 'datos_pivot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.index');
        $pedido = new Pedido(['mesa' => 'mesa 1', 'total' => '122.00']);
        $pedido->save();
        $productos = Producto::all();         
        foreach ($productos as $producto) {
            $pedido->productos()->attach($producto->producto_id, ['pedido_id' => $pedido->pedido_id ,'cantidad' => '1', 'subtotal' => $producto->precio]);
        }
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
            $mesa = $request->pedido['mesa'];
            $total = $request->pedido['total'];
            $estado_pedido = true;
            $pedido = new Pedido(['mesa' => $mesa, 'total' => $total,'estado_pedido' => $estado_pedido]);
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
    public function update(Request $request, Pedido $pedido)
    {
        if($request->ajax()){
            DB::update('update pedido set estado_pedido = false where pedido_id ='.$pedido->pedido_id);
            return response()->json([
                "mensaje1" => 'update pedido set estado_pedido = false where pedido_id ='.$pedido->pedido_id,
                "mensaje2" => $pedido->pedido_id
            ]);
        }
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
