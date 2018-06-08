<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Model\Role;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticado');
        $this->middleware('administrador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::paginate();

        // return view('users.index', compact('users'));
        $users = User::paginate(5);
        // $users = User::all();
        // $roles = User::pluck('nombre', 'role_id');
        return view('users.index', compact('users'), ['roles' => Role::with('Users')->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = User::find($id);
        $roles = Role::pluck('nombre', 'id');

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::get();
        $roles = Role::pluck('nombre', 'id');
        return view('users.create',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = request()->all();
        $user->nombre = $data['nombre'];
        $user->phone = $data['phone'];
        $user->direccion = $data['direccion'];
        $user->username = $data['username'];
        $user->ci = $data['ci'];
        if($request->hasFile('foto')){
    		$foto = $request->file('foto');
    		$filename = time() . '.' . $foto->getClientOriginalExtension();
    		Image::make($foto)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user()->nombre;
    		$user->foto = '/uploads/avatars/' . $filename;
    	}
        $user->estado = $data['estado'];
        $user->role_id = $data['role_id'];
        // $user->update();
        
        $user->save();
        return redirect()->route('users.index', array('users' => Auth::user()) )
            ->with('mensaje', 'Usuario actualizado con éxito');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = request()->all();
        // $estado = 0;
        $user = new User;
            $user->nombre =$data['nombre'];
   			$user->phone=$data['phone'];
   			$user->direccion=$data['direccion'];
            $user->username=$data['username'];
            $user->ci=$data['ci'];
            // $user->foto=$path_foto;
            $user->password=$data['ci'];
            $user->estado=$data['estado'];
            $user->role_id=$data['role_id'];
            if($request->hasFile('foto')){
            
    		$foto = $request->file('foto');
    		$filename = time() . '.' . $foto->getClientOriginalExtension();
    		Image::make($foto)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user->foto = $filename;
    	}
        // ]); 
        $user->save();

        // $user = new User;
        // $user->fill($request->except(['foto']));
        // $user->foto = $path_foto;//almacenamos ruta de foto en BD
        // $user->save();
        return redirect()
            ->route('users.index')
            ->with('mensaje', 'Se creó un nuevo usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
