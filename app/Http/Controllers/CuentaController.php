<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cuenta;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::all();
        return view('cuentas.index', ['cuentas' => $cuentas]);
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
    public function store(Request $request)
    { 
        if ($request->ajax()) {
            $cuenta = $this->existeCuentaActiva($request->pedido_id);
            if($cuenta == false){
                Cuenta::create([
                    'estado_pago' => false,
                    'total' => $request->monto_total,
                    'pedido_id' => $request->pedido_id,
                    'cliente_id' => 1
                ]);
                $cuentaNueva = $this->existeCuentaActiva($request->pedido_id);
                
                $res = ["cuenta_id" => $cuentaNueva->cuenta_id, 'mensaje'=> 'ya cre mi cuenta nueva'];
            }else{
                $res = ["cuenta_id" => $cuenta->cuenta_id, 'mensaje'=> 'actualice los datos del pedido de esta cuenta'];
            }
            return response()->json($res);
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

    public function existeCuentaActiva($pedido_id){
        $res=false;
        $datas=Cuenta::all();
        foreach($datas as $data){
            if($data->estado_pago==false && $data->pedido_id==$pedido_id){
                $res = $data;
                break;
            }
        }
        return $res;
    }

}
