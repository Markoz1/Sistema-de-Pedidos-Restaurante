<?php

namespace App\Http\Controllers;

use App\Model\Producto;
use App\Model\Categoria;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('menu.index', compact('productos'), compact('categorias'));
    }

    public function getModalMenu()
    {
        $producto = Producto::findOrFail(Input::get('p_id'));
        return view('menu.modal', ['producto' => $producto]);
    }
}
