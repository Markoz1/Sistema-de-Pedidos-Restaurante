<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cuenta;
use Barryvdh\DomPDF\Facade as PDF;

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
    public function pdf(Cuenta $cuenta){
        $id_cliente = $cuenta->cliente_id;
        $id_usuario = $cuenta->users_id;
        $fecha = $this->calcularFecha($cuenta->updated_at);
        $cuenta->updated_at=$fecha;
        $pdf = PDF::loadView('cuentas.pdf.factura', compact('cuenta','fecha'));
        return $pdf->download('factura.pdf');
        //return view('cuentas.pdf.factura',compact('cuenta','fecha'));
    }
    private function calcularFecha($fecha){
        $res= explode(' ',$fecha)[0];
        return $res;
    }
}
