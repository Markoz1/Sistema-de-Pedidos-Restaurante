@extends('layout.main')
@section('content')
    <article class="content item-editor-page">
            <div class="title-block">
                <h3 class="title"> Modificar Usuario
                    <span class="sparkline bar" data-type="bar"></span>
                </h3>
            </div>
        {{-- <form method="POST" role="form" action="{{ url("users/{$user->id}") }}" > --}}
        {!! Form::Model($user, ['route' => ['users.update', $user->id],'method' => 'put', 'files' => true]) !!}
            {{-- {{ method_field('PATCH') }} --}}
            {{-- {{ csrf_field() }}  --}}
        {{-- <form name="item"> --}}
            <div class="card card-block">
                <div class="form-group row">
                    {!! Form::label('nombre', 'Nombre completo', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('nombre', "$user->nombre", ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':'')]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('phone', 'Teléfono', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="input-group col-sm-10">                        
                        {!! Form::number('phone', "$user->phone" , ['class' => 'form-control boxed '.($errors->has('phone')?'is-invalid':'')]) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="phone">#</span>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                    </div>
                </div>         
                <div class="form-group row">
                    {!! Form::label('direccion', 'Dirección', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('direccion', "$user->direccion", 
                        ['class' => 'form-control boxed '.($errors->has('direccion')?'is-invalid':''), 'placeholder' => 'Ingresa la Direccion', 'rows' => '3']) !!}
                        <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('username', 'Username', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('username', "$user->username", ['class' => 'form-control boxed '.($errors->has('username')?'is-invalid':'')]) !!}
                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('ci', 'C.I.', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('ci', "$user->ci", ['class' => 'form-control boxed '.($errors->has('ci')?'is-invalid':'')]) !!}
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
                    {!! Form::label('role_id', 'Rol', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('role_id',$roles, null, ['class' => 'form-control boxed '.($errors->has('role_id')?'is-invalid':''),
                        'placeholder' => (count($roles) === 0)?'Ninguna categoria añadida':'Selecciona un Rol']) !!}
                        <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                    </div>
                </div>  
                <div class="form-group row">
                    {!! Form::label('estado', 'Estado', ['class' => 'col-md-2 form-control-label text-xs-right']) !!}
                    <div class="col-md-10">
                        <label>
                            {{-- {!! Form::radio('estado',1, true,['class' => 'radio squared']) !!} --}}
                            <input class="radio squared" {{ $user->estado==1 ? 'checked='.'"'.'checked'.'"' : '' }} name="estado" type="radio" value="1" id="estado">
                            <span>Activo</span>
                        </label>
                        <label>
                            {{-- {!! Form::radio('estado',0, false,['class' => 'radio squared']) !!} --}}
                            <input class="radio squared" {{ $user->estado==0 ? 'checked='.'"'.'checked'.'"' : '' }} name="estado" type="radio" value="0" id="estado">
                            <span>Inactivo</span>
                        </label>
                        <div class="invalid-feedback">{{ $errors->first('estado') }}</div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary"> Actualizar </button>
                    </div>
                </div>
            </div>
        </form>
    </article>
@endsection