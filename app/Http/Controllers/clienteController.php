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

}
