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
            $cuenta = $this->existeCuentaActiva($request->mesa);
            if($cuenta == false){
                Cuenta::create([
                    'mesa' => $request->mesa,
                    'precio_total' => 0.00,
                    'estado_cuenta' => true
                ]);
                $cuentaNueva = $this->existeCuentaActiva($request->mesa);
                $res = ["cuenta" => $cuentaNueva];
            }else{
                $res = ["cuenta" => $cuenta];
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

    public function existeCuentaActiva($mesa){
        $res=false;
        $datas=Cuenta::all();
        foreach($datas as $data){
            if($data->estado_cuenta==true && $data->mesa==$mesa){
                $res = $data;
                break;
            }
        }
        return $res;
    }
}
