<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Model\Role;
use App\Model\User;

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
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        // $user = User::find($id);
        $data = request()->all();
        $user->nombre = $data['nombre'];
        $user->phone = $data['phone'];
        $user->direccion = $data['direccion'];
        $user->username = $data['username'];
        $user->ci = $data['ci'];
        // $user->foto = $data['foto'];
        // $user->foto = 'storage/fotos/'.$data['foto'];
        $user->estado = $data['estado'];
        $user->role_id = $data['role'];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // $path = $request->foto->hashName();
            $request->foto->store('storage/app/fotos');
            $path = 'storage/'.$request->foto->store('fotos', 'public');;
            $user->foto = $path;
            // $user->save();    
        }
        // $request->foto->storeAs('public/fotos/');
        // $path = $request->foto->hashName();
        // $user->foto = $path;
        // $image->save();
        // $user->role_id = $data['role'];
        // $user->update();
        $user->save();

        // $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index', $user->id)
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
        //$path_foto = Storage::disk('public')->putFile('fotos', $request->foto);
        // $path_foto = 'storage/'.$request->foto->store('fotos', 'public');//almacenando foto en directorio Public
        $estado = 0;
        // dd($path_foto);

        $path_foto = 'storage/app/public/'.$request->foto->store('fotos', 'public');//almacenando foto en directorio Public
        $user = new User;
        $user->fill($request->except(['foto']));
        $user->foto = $path_foto;//almacenamos ruta de foto en BD
        // dd($path_foto);
        // User::create([
            $user->nombre =$data['nombre'];
   			$user->phone=$data['phone'];
   			$user->direccion=$data['direccion'];
            $user->username=$data['username'];
            $user->ci=$data['ci'];
            // $user->foto=$path_foto;
            $user->password=$data['ci'];
            $user->estado=$estado;
            $user->role_id=$data['role'];
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
