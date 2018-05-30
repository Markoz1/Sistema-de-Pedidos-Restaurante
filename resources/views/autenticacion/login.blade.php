@extends('layout.main')
@section('content-no-auth')
    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <h1 class="auth-title">
                        <div class="logo">
                            <span class="l l1"></span>
                            <span class="l l2"></span>
                            <span class="l l3"></span>
                            <span class="l l4"></span>
                            <span class="l l5"></span>
                        </div> Restaurante </h1>
                </header>
                <div class="auth-content">
                    <h4 class="text-center pb-4">Iniciar sesión</h4>
                    {!! Form::open(['route' => 'login']) !!}
                        <div class="form-group {{($errors->has('username')?'has-error':'')}}">
                            {!! Form::label('username', 'Nombre de usuario', ['class' => 'form-control-label']) !!}
                            {!! Form::text('username', null, ['class' => 'form-control underlined']) !!}
                            <span class="has-error">{{ $errors->first('username') }}</span>
                        </div>
                        <div class="form-group {{($errors->has('password')?'has-error':'')}}">
                            {!! Form::label('password', 'Contraseña', ['class' => 'form-control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control underlined']) !!}
                            <span class="has-error">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection