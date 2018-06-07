@extends('layout.main')
@section('content')

    <article class="content items-list-page">
        <div class="title-block">
                <h1 class="title"> Categorias </h1>
                <p class="title-description"> Lista de categorias </p>
        </div>
        @if(session('mensaje'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('mensaje') }}
            </div>
        @endif
        <section class="section">
            <div class="card card-block sameheight-item">
                <div class="title-block">
                    <h3 class="title"> Ingrese los datos de la nueva categoria </h3>
                </div>
                <form method="POST" role="form" action="{{url('categorias')}}" >
                    {{ csrf_field() }} 
                    <div class="form-group has-error">
                        <label class="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombreCategoria" value="{{ old('nombreCategoria')}}">
                        @if( $errors->has('nombreCategoria') )
                            <span class="has-error">
                            {{ $errors->first('nombreCategoria') }}
                            </span>							
                        @endif             
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary"> Crear</button>
            
                        </div>
                    </div>
                </form>
            </div>
        </section>
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
                                <div class="no-overflow"> {{ "activo" }}</div>
                            @else
                                <div class="no-overflow"> {{ "inactivo" }}</div>
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