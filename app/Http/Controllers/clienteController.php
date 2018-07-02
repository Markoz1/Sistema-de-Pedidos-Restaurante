<?php
namespace App\Http\Controllers;
use App\Model\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\BusquedaClienteRequest;

class clienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticado');
        $this->middleware('cajero');  
    }
    public function index()
    {
           $clientes = Cliente::where('cliente_id','!=','1')->paginate(5);
           return view('cliente.index', ['clientes' => $clientes]);
    }
    public function create()
    {
        return view('cliente.create');
    }

  function store(Request $request){
        $data = request()-> validate([
   			'nombre' =>'nullable|min:3|max:50|unique:cliente,nombre',
            'nit'=>'required|numeric|unique:cliente,nit',
            'telefono'=>'nullable|numeric',
   			'direccion'=>'nullable|min:3|max:80',
        ]);
        $cliente = new Cliente;
        $cliente->fill($request->all());
        if(!$request->filled('nombre')){
            $cliente->nombre = "SIN NOMBRE";
        }
        $cliente->save();              
        if($request->ajax()){
            return response()->json(
                $cliente->toArray()
            );
        }
        else{
            return redirect()->route('clientes.index')->with('mensaje','Nuevo Cliente Registrado');
        }
    }
    public function edit(Cliente $cliente)
    {   
        //['categoria' => $categoria]
        return view('cliente.edit', compact('cliente'));
    }
    public function update(Cliente $cliente)
    {
        $data = request()-> validate([
            'nombre' =>'nullable|min:3|max:50|unique:Cliente,nombre,'.$cliente->cliente_id . ",cliente_id",
            'nit'=>'required|numeric|unique:Cliente,nit,'.$cliente->cliente_id . ",cliente_id",
            'telefono'=>'nullable|numeric',
            'direccion'=>'nullable|min:3|max:80',
     ]);
        $cliente->Update($data);
        return redirect()->route('clientes.index')->with('mensaje','La Lista de Clientes ha sido Actualizada');
    }
    public function buscarNit(BusquedaClienteRequest $request)
    {
        if ($request->ajax()) {
            $nit = $request->input('nit');
            $cliente = Cliente::ofNit($nit);
            return response()->json(
                $cliente->toArray()
            );
        }        
    }
}
