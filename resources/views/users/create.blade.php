@extends('layout.main')
@section('content')
    <article class="content item-editor-page">
        <div class="title-block">
            <h3 class="title"> Nuevo Usuario
                <span class="sparkline bar" data-type="bar"></span>
            </h3>
        </div>
        {!! Form::open(['route' => 'users.store', 'method' => 'post', 'files' => true]) !!}
        <form name="item">
            <div class="card card-block">
                <div class="form-group row">
                    {!! Form::label('nombre', 'Nombre Completo', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('nombre', "", ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':''), 'placeholder' => 'Ingresa el nombre']) !!}
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('phone', 'Teléfono', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="input-group col-sm-10">                        
                        {!! Form::number('phone', "phone" , ['class' => 'form-control boxed '.($errors->has('phone')?'is-invalid':''), 'placeholder' => 'Ingresa el teléfono']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="phone">#</span>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                    </div>
                </div>         
                <div class="form-group row">
                    {!! Form::label('direccion', 'Dirección', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('direccion', "", 
                        ['class' => 'form-control boxed '.($errors->has('direccion')?'is-invalid':''), 'placeholder' => 'Ingresa la Direccion', 'rows' => '3']) !!}
                        <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('username', 'Username', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('username', "", ['class' => 'form-control boxed '.($errors->has('username')?'is-invalid':''), 'placeholder' => 'Ingresa username']) !!}
                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('ci', 'C.I.', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('ci', "ci", ['class' => 'form-control boxed '.($errors->has('ci')?'is-invalid':''), 'placeholder' => 'Ingresa CI']) !!}
                        <div class="invalid-feedback">{{ $errors->first('ci') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('foto', 'Foto', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::file('foto', ['class' => 'form-control boxed '.($errors->has('foto')?'is-invalid':''), 'accept' => 'image/*']) !!}
                        <div class="invalid-feedback">{{ $errors->first('foto') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('role', 'Rol', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {{-- {!! Form::number('estado', "ci", ['class' => 'form-control boxed '.($errors->has('estado')?'is-invalid':'')]) !!} --}}
                        {{-- {{ $selected = $user->estado->lists('id') }} --}}
                        {{-- {!! Form::select('estado', array(0 => 'activo', 1 => 'inactivo'), $selected, ['class' => 'form-control'] ) !!} --}}
                        <select name="role">
                            <option value="" selected="selected">Selecciona un rol</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->nombre}}</option>
                            @endforeach
                        </select>
                        {{-- {!! Form::select('estado', array(0 => 'activo', 1 => 'inactivo')) !!} --}}
                        <div class="invalid-feedback">{{ $errors->first('role') }}</div>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    {!! Form::label('estado', 'Estado', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        <select name="estado">
                            <option value="" selected="selected">Selecciona un estado</option>
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('estado') }}</div>
                    </div>
                </div> --}}
                <div class="form-group row mt-4">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary"> Crear </button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </article>
@endsection
