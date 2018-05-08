@extends('layout.main')
@section('content')
    <article class="content items-list-page">   
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title"> Productos
                            <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm rounded-s"> Nuevo Producto </a>
                        </h3>
                        <p class="title-description"> Lista de Productos</p>
                    </div>
                </div>
            </div>
            <div class="items-search">
                <form class="form-inline">
                    <div class="input-group">
                            <select class="form-control boxed col-4" id="ss">
                                    <option id="1">Por Nombre</option>
                                    <option id="2">Por Categoria</option>
                                    <option id="3">Por Estado</option>
                                    <option id="4">boxed rounded-s</option>
                            </select>
                            <input type="text" class="form-control boxed col-7" placeholder="Criterio de Busqueda"> 
                                <div style="width:2px;"></div>                                            
                                <div>
                                    <button class="btn btn-dark" type="button">
                                        <b>Buscar</b>
                                    </button>
                                </div>                            
                    </div>
                </form>
            </div>
        </div>
        @if(session('mensaje'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>{{ session('mensaje') }}
        </div>
        @endif
        <div class="card items">
            <ul class="item-list striped">
                <li class="item item-list-header">
                    <div class="item-row">
                        <div class="item-col item-col-header fixed item-col-img md">
                            <div>
                                <span>Foto</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-title pl-3">
                            <div>
                                <span>Nombre</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-sales text-center">
                            <div>
                                <span>Precio</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-category text-center">
                            <div class="no-overflow">
                                <span>Categoria</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                    </div>
                </li>                
                @foreach ($productos as $producto)               
                <li class="item">
                    <div class="item-row">
                        <div class="item-col fixed item-col-img md">
                            <div class="item-img rounded" style="background-image: url({{ asset($producto->foto) }})"></div>
                        </div>
                        <div class="item-col fixed pull-left item-col-title pl-3">
                            <div class="item-heading">Nombre</div>
                            <div>{{ $producto->nombre }}</div>
                        </div>
                        <div class="item-col item-col-sales text-center">
                            <div class="item-heading">Precio</div>
                            <div>{{ $producto->precio }} BOB</div>
                        </div>
                        <div class="item-col item-col-category no-overflow text-center">
                            <div class="item-heading">Categoria</div>
                            <div class="no-overflow">
                                <a>{{ $producto->categoria->nombre }}</a>
                            </div>
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
                                            <a class="edit" href="#">
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
        <nav class="text-right">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href=""> Prev </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href=""> 1 </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href=""> 2 </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href=""> Next </a>
                </li>
            </ul>
        </nav>
    </article>
@endsection