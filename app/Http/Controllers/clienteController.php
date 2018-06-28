<?php
namespace App\Http\Controllers;
use App\Model\Cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticado');
        $this->middleware('cajero');  
    }
    public function index()
    {
           $clientes = Cliente::paginate(5);
           return view('cliente.index', ['clientes' => $clientes]);
    }
    public function create()
    {
        return view('cliente.create');
    }

  function store(Request $request){
    $data = request()-> validate([
   			'nombre' =>'required|min:3|max:50|unique:cliente,nombre',
            'nit'=>'nullable|numeric|unique:cliente,nit',
            'telefono'=>'nullable|numeric',
   			'direccion'=>'nullable|min:3|max:80',
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
            'nombre' =>'required|min:3|max:50|unique:Cliente,nombre,'.$cliente->cliente_id . ",cliente_id",
            'nit'=>'nullable|numeric|unique:Cliente,nit,'.$cliente->cliente_id . ",cliente_id",
            'telefono'=>'nullable|numeric',
            'direccion'=>'nullable|min:3|max:80',
     ]);
        $cliente->Update($data);
        return redirect()->route('clientes.index')->with('mensaje','La Lista de Clientes ha sido Actualizada');
    }
    public function buscarNit(Request $request)
    {
        if ($request->ajax()) {
            $datos = request()->validate([
                'nit'=> 'required|numeric|exists:cliente,nit'
            ]);
            $nit = $datos['nit'];
            $cliente = Cliente::ofNit($nit);
            return response()->json(
                $cliente->toArray()
            );
        }        
    }
}
