<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cliente;
class clienteController extends Controller
{
    public function index()
    {
           $clientes = Cliente::all();
           return view('cliente.index', ['clientes' => $clientes]);
    }

}
