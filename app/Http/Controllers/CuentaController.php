<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cuenta;
use App\Model\Pedido;
use App\Model\Cliente;
use App\Model\Producto;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos = Pedido::findOrFail($id)
            ->where('cuenta_id', $id)
            ->where('estado_pedido', "<>", 2)->get();
        $cuenta = Cuenta::findOrFail($id);
        $cliente_id = $cuenta->cliente_id;
        $cliente = Cliente::findOrFail($cliente_id);
        return view('cuentas.show')
            ->with('pedidos', $pedidos)
            ->with('cliente', $cliente);
    }

    /**
     * Get a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detalleProductos(Request $request)
    {       
        $pedido = Pedido::find( $request->id );
        $producto_id = $pedido->producto_id;
        $productos = Pedido::all();
        // return response ()->json ( $producto );
        // $data = Pedido::all();
    return view( 'cuentas.modal-detalle-productos' )->with( 'productos',$productos );
            
        // }
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
