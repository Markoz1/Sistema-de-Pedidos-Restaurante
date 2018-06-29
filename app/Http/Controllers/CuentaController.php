<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cuenta;
use Barryvdh\DomPDF\Facade as PDF;
use App\Model\Pedido;
use App\Model\Cliente;
use App\Model\Producto;
use App\Model\Role;
use App\Model\User;

class CuentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticado');
        $this->middleware('cajero');  
    }
    /**
     * Display a listing of the resource.
     *
      * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::where('estado', 1)->orderBy('id', 'desc')->paginate(5);
        return view('cuentas.index', compact('cuentas'));
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
        $data = request();
        //dd($data);
       Cuenta::create([
              'estado' =>0,
              'cliente_id'=>$data['cliente_id'],
              'users_id'=>$data['mesa_id'],
       ]);
       return redirect()
            ->route('mesas.index');
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
        $cuenta = Cuenta::findOrFail($id);
        return view('cuentas.facturacion',compact('cuenta'));
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
        $cuenta = Cuenta::findOrFail($id);
        $cuenta->fill($request->all());
        $cuenta->estado = 1;//cuenta cerrada
        $cuenta->save();
        foreach ($cuenta->pedidos as $pedido) {
            $pedido->estado_pedido = 2;//pedido cerrado
            $pedido->save();
        }
        $mesa = $cuenta->mesa;
        $mesa->estado = 1;//mesa libra
        $mesa->save();
        return redirect()
            ->route('cuentas.index')
            ->with('mensaje', 'La cuenta '.$cuenta->id.' se cerro correctamente');
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
    public function pdf(Cuenta $cuenta){
        $id_cliente = $cuenta->cliente_id;
        $id_usuario = $cuenta->users_id;
        $fecha = $this->calcularFecha($cuenta->updated_at);
        $cuenta->updated_at=$fecha;
        //$pdf = PDF::loadView('cuentas.pdf.factura', compact('cuenta','fecha'));
        //return $pdf->download('factura.pdf');
        return view('cuentas.pdf.factura',compact('cuenta','fecha'));
    }
    private function calcularFecha($fecha){
        $res= explode(' ',$fecha)[0];
        return $res;
    }
}
