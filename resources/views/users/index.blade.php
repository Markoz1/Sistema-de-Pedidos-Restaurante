@extends('layout.main')
@section('content')

<article class="content items-list-page">   
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> Usuarios
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm rounded-s"> Nuevo Usuario </a>
                    </h3>
                    <p class="title-description"> Lista de Usuarios</p>
                </div>
            </div>
        </div>
    </div>
    @if(session('mensaje'))
	    <div class="alert alert-dismissible alert-success">
	        <button type="button" class="close" data-dismiss="alert">×</button>
	        {{ session('mensaje') }}
	    </div>
    @endif

    <section class="section">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Username</th>
                                    <th>CI</th>
                                    <th>Estado</th>
                                    <th>Rol</th>

                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td><img class="item-img rounded" width="70%" src="{{ asset($user->foto) }}" alt="{{$user->nombre}}"></td>
                                        {{-- <td><img class="item-img rounded" width="70%" style="background-image: url({{ asset($user->foto) }})" alt="{{$user->nombre}}"></td> --}}
                                        <td>{{$user->nombre}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->direccion}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->ci}}</td>
                                        @if ($user->estado === 0)
                                            <td><span class="badge badge-danger">Inactivo</span></td>
                                        @elseif($user->estado === 1)
                                            <td><span class="badge badge-success">Activo</span></td>
                                        @endif                                      
                                        <td>{{$user->role->nombre}}</td>
                                        <th><a href="{{ route('users.edit',[$user->id]) }}"><i class="fa fa-pencil"></i></a></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
    {!! $users->appends($_GET)->links('pagination') !!}
</article>
@endsection