@extends('layout.main')
@section('content')
    <article class="content">
        <div class="title-block">
            <h3 class="title"> Información de la Factura
            </h3>
        </div>
        {{-- <div class="subtitle-block">
            <h3 class="subtitle"> Listado de mesas </h3>
        </div> --}}
        <section class="section">
            <div class="card card-block">
                {!! Form::Model($cuenta, ['route' => ['mesas.update', $cuenta->id],'method' => 'put']) !!}
                <h4 class="tittle">Cliente</h4>
                <div class="form-group row">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('nombre', $cuenta->cliente->nombre, ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':'')]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('Nit', $cuenta->cliente->nit, ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':'')]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </article>
@endsection