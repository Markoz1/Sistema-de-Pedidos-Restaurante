<?php

namespace App\Http\Controllers;

use App\Model\Producto;
use App\Model\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('autenticado');
        $this->middleware('autorizado', ['only' => ['index']]);
        $this->middleware('mesa', ['only' => ['menu']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio');
    }
    public function menu()
    {
        $categorias = Categoria::all();
        return view('menu.index', compact('categorias'));
    }
}
