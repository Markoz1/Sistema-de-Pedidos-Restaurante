@extends('layout.main-errors') 
@section('content')
<div class="app blank sidebar-opened">
    <article class="content">
        <div class="error-card global">
            <div class="error-title-block">
                <h1 class="error-title">404</h1>
                <h2 class="error-sub-title"> Recurso no encontrado </h2>
            </div>
            <div class="error-container">
                <p>No se puede encontrar el recurso que esta solicitando.</p>
                {{--
                <div class="row">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">Search</button>
                                </span>
                        </div>
                    </div>
                </div> --}}
                <br>
                <a class="btn btn-primary" href="{{ route('inicio') }}">
                        <i class="fa fa-angle-left"></i> Volver a Inicio </a>
            </div>
        </div>
    </article>
</div
@endsection