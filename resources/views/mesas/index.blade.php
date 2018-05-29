@extends('layout.main')
@section('content')
<article class="content">
    <div class="title-block">
        <h3 class="title"> Mesas 
            <a href="#nueva_mesa" class="btn btn-primary btn-sm rounded-s" onclick="crear_mesa()"> Nueva Mesa </a>
        </h3>
    </div>
    @include('mesas.create')
    @include('mesas.edit')
    <div class="subtitle-block">
        <h3 class="subtitle"> Listado de mesas </h3>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                        </div>
                        <section class="example">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Nombre</th>
                                        <th>Nombre de usuario</th>
                                        <th>Contraseña</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>mesa 1</td>
                                        <td>mesa 1</td>
                                        <td>123456</td>
                                        <td>
                                            <div class="item-list">
                                                <div class="item-row item-col fixed item-col-actions-dropdown">
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
                                                                    <a class="edit" href="#" onclick="editar_mesa()">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>                                   
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
@endsection
@section('script')
    <script>
        function crear_mesa() {
            $('#create_mesa').collapse('toggle');
        }
        function editar_mesa() {
            $('#edit_mesa').collapse('toggle');
        }
    </script>
@endsection