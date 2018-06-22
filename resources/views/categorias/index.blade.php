@extends('layout.main')
@section('content')

    <article class="content items-list-page">
        <div class="title-block">
                <h1 class="title"> Categorias 
                    <a href="#" class="btn btn-primary btn-sm rounded-s" onclick="crear_categoria()" id="nueva_categoria" name="nueva_categoria"> Nueva Categoria </a>
                </h1>
                <p class="title-description"> Lista de categorias </p>
        </div>
        @if(session('mensaje'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('mensaje') }}
            </div>
        @endif
        @include('categorias.create')
        <div class="card items">
            <ul class="item-list striped">
                <li class="item item-list-header">
                    <div class="item-row">
                        <div class="item-col item-col-header fixed item-col-img md">
                            <div>
                                <span># Id</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-title">
                            <div>
                                <span>Nombre categoria</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-sales">
                            <div>
                                <span>Estado</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-date">
                            <div>
                                <span></span>
                            </div>
                        </div>
                        <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                    </div>
                </li>
                @foreach ($categorias as $categoria)
                <li class="item">
                    <div class="item-row">
                        <div class="item-col fixed item-col-img md">
                            <div class="item-heading"># Id</div>
                            <div class="no-overflow"> {{ $categoria->categoria_id}} </div>
                        </div>
                        <div class="item-col fixed pull-left item-col-title">
                            <div class="item-heading">Nombre</div>
                            <div>
                                <div class="no-overflow"> {{ $categoria->nombre }} </div>
                            </div>
                        </div>
                        <div class="item-col item-col-sales">
                            <div class="item-heading">Estado</div>
                            @if ($categoria->estado == 1)
                                <div class="no-overflow">
                                    <span class="badge badge-success">{{ "Activo" }}</span>
                                </div>
                            @else
                                <div class="no-overflow">
                                    <span class="badge badge-danger">{{ "Inactivo" }}</span>
                                </div>
                                
                            @endif
                        
                        </div>
                        <div class="item-col item-col-date">
                            <div class="item-heading">Acciones</div>
                        </div>
                        <div class="item-col fixed item-col-actions-dropdown">
                            <div class="item-actions-dropdown">
                                <a class="item-actions-toggle-btn">
                                    <span class="inactive">
                                        <i class="fa fa-cog"></i>
                                    </span>
                                    <span class="active">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                                <div class="item-actions-block">
                                    <ul class="item-actions-list">
                                        <li>
                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal">
                                                <i class="fa fa-trash-o "></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="edit" href="{{ route('categorias.edit',[$categoria->categoria_id]) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </article>
@endsection
@section('script')
    @if($errors->has('nombreCategoria'))
    <script>
        $('#create_categoria').collapse('show');
    </script>        
    @endif
    <script>
        function crear_categoria() {
            $('#create_categoria').collapse('toggle');
        };        
    </script>
@endsection