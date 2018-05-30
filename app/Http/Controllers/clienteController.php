<?php
namespace App\Http\Controllers;
use App\Model\Cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function index()
    {
           $clientes = Cliente::all();
           return view('cliente.index', ['clientes' => $clientes]);
    }
    public function create()
    {
        return view('cliente.create');
    }

  function store(Request $request){
    $data = request()-> validate([
   			'nombre' =>'required|min:3|max:50',
            'nit'=>'required|numeric|unique:Cliente,nit',
            'telefono'=>'required|numeric',
   			'direccion'=>'required|min:3|max:80',
        ]);
        
        Cliente::create([
            'nombre' =>$data['nombre'],
   			'nit'=>$data['nit'],
   			'telefono'=>$data['telefono'],
            'direccion'=>$data['direccion'],
        ]);               
     
        return redirect()->route('clientes.index')->with('mensaje','Nuevo Cliente Registrado');
    }

}
