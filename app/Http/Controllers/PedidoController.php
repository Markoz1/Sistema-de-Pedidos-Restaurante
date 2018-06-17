<?php

namespace App\Http\Controllers;

use App\Model\Pedido;
use App\Model\Producto;
use App\Model\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticado');
        $this->middleware('cocinero', ['except' => ['store']]);
        $this->middleware('mesa', ['only' => ['store']]);  
    }
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
            $mesa_id = $request->pedido['mesa_id'];
            $total = $request->pedido['total'];        
            $estado_pedido = -1;
            $cuenta_id = 1;//solo para probar se agregaran pedidos a la cuenta id=1
            $pedido = new Pedido(['users_id' => $mesa_id, 'total' => $total,'estado_pedido' => $estado_pedido,'cuenta_id' => $cuenta_id]);
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
        $a=$pedido->cuentas();
        if($request->ajax()){
            if($pedido->estado_pedido == -1){
                DB::update('update pedido set estado_pedido = 0 where pedido_id ='.$pedido->pedido_id);
                //DB::update('update cuenta set precio_total=precio_total+'.$pedido->total.' where cuenta.mesa =='.$pedido->mesa);
            }else{
                DB::update('update pedido set estado_pedido = 1 where pedido_id ='.$pedido->pedido_id);
            }
            //se tiene que agregar el valor a la cuenta actual por que se entrego el pedido

            return response()->json([
                'pedido' => $pedido,
                'cuentas' => $a        
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
    public function existePedido($mesa){
        $pedidos = Pedido::all()->where('mesa',$mesa);
        $cuentas = Cuenta::all();
        $res=['existe' => false];
        $encontrado = false;
        
        foreach($pedidos as $pedido){
            if($encontrado==false){
                foreach($cuentas as $cuenta){
                    if($pedido->pedido_id == $cuenta->pedido_id && $cuenta->estado_pago==false){
                        $encontrado=true;
                        $res =['existe'=>true, 'pedido_id' => $pedido->pedido_id];
                        break;
                    }
                }
            }else{
                break;
            }   
        }
        return response()->json($res);
    }
}
