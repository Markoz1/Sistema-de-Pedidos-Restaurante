@extends('layout.main')
@section('content')
    <article class="content item-editor-page">
        <div class="title-block">
            <h3 class="title"> Nuevo Cliente
                <span class="sparkline bar" data-type="bar"></span>
            </h3>
        </div>
        {!! Form::open(['route' => 'clientes.store', 'method' => 'post']) !!}
        <form name="item">
            <div class="card card-block">
                <div class="form-group row">
                    {!! Form::label('nombre', 'Nombre o Razon Social', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('nombre', null, ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':'')]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('nit', 'NIT', ['class' => 'col-sm-2 form-control-label text-xs-right required']) !!}
                    <div class="input-group col-sm-10">                        
                        {!! Form::number('nit', null, ['class' => 'form-control boxed '.($errors->has('nit')?'is-invalid':''), 'min' => '0']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="nit">NIT</span>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('nit') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                        {!! Form::label('telefonof', 'Telefono/Celular', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                        <div class="input-group col-sm-10">                        
                            {!! Form::number('telefono', null, ['class' => 'form-control boxed '.($errors->has('telefono')?'is-invalid':''), 'min' => '0']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="telefono">#</span>
                            </div>
                            <div class="invalid-feedback">{{ $errors->first('telefono') }}</div>
                        </div>
                </div>               
                <div class="form-group row">
                    {!! Form::label('direccion', 'Direccion', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('direccion', null, 
                        ['class' => 'form-control boxed '.($errors->has('direccion')?'is-invalid':''), 'placeholder' => 'Ingresa la Direccion', 'rows' => '3']) !!}
                        <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                    </div>
                </div>
                <small class="required">Campo obligatorio</small>
                <div class="form-group row mt-4">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary" name="crear"> Crear </button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </article>
@endsection
