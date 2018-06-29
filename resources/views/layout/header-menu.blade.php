<header class="header" style="position:initial;">
<div class="container-fluid">
    <div class="row">
        <div class="col-10 d-flex justify-content-center"><h1>Nombre del Restaurante</h1></div>
        <div class="col-2 d-flex align-items-center justify-content-end">
            {{-- <a href="{{ route('logout')}}"> Cerrar sesión </a> --}}
            <div class="header-block header-block-nav">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="name"> Cerrar sesión </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    {!! Form::open(['route' => 'logout.mesa', 'class' => 'px-4 py-3']) !!}
                        {!! Form::hidden('username', Auth::user()->username) !!}
                        <div class="form-group {{($errors->has('password')?'has-error':'')}}">
                            {!! Form::label('password', 'Contraseña', ['class' => 'form-control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control underlined']) !!}
                            <span class="has-error">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary" name="ingresar">Cerrar sesión</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>            
        </div>
    </div>
</div>
</header>