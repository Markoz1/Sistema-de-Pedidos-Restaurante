<?php

namespace App\Http\Controllers;

use App\Model\Producto;
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
        return view('menu.index', compact('productos'));
    }

    public function getModalMenu()
    {
        $producto = Producto::findOrFail(Input::get('p_id'));
        return view('menu.modal', ['producto' => $producto]);
    }
}
