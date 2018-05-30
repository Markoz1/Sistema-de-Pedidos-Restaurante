<?php
namespace App\Http\Controllers;
use App\Model\Cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function index()
    {
           $clientes = Cliente::paginate(9);
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
    public function edit(Cliente $cliente)
    {   
        //['categoria' => $categoria]
        return view('cliente.edit', compact('cliente'));
    }
    public function update(Cliente $cliente)
    {
        $data = request()-> validate([
            'nombre' =>'required|min:3|max:50',
            'nit'=>'required|numeric|unique:Cliente,nit,'.$cliente->cliente_id . ",cliente_id",
            'telefono'=>'required|numeric',
            'direccion'=>'required|min:3|max:80',
     ]);
        $data = request()->all();
        $cliente->Update($data);
        return redirect()->route('clientes.index')->with('mensaje','La Lista de Clientes ha sido Actualizada');
    }
}
