@extends('layout.main')
@section('content')
    <article class="content items-list-page">   
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title"> Menu
                            <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm rounded-s"> Nuevo Plato </a>
                        </h3>
                        <p class="title-description"> Lista de Platos</p>
                    </div>
                </div>
            </div>
        </div>
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
                <li class="item">
                    <div class="item-row">
                        <div class="item-col fixed item-col-img md">
                            <div class="item-img rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg)"></div>
                        </div>
                        <div class="item-col fixed pull-left item-col-title pl-3">
                            <div class="item-heading">Nombre</div>
                            <div>12 Myths Uncovered About IT</div>
                        </div>
                        <div class="item-col item-col-sales text-center">
                            <div class="item-heading">Precio</div>
                            <div> 46323 </div>
                        </div>
                        <div class="item-col item-col-category no-overflow text-center">
                            <div class="item-heading">Categoria</div>
                            <div class="no-overflow">
                                <a>Software</a>
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
                                            <a class="edit" href="item-editor.html">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
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