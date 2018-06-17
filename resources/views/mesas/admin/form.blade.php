
<div class="form-group row">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 form-control-label text-xs-right']) !!}
    <div class="col-md-3">
        {!! Form::text('nombre', 'Mesa', ['class' => 'form-control boxed', 'readonly' => 'readonly']) !!}        
    </div>
    <div class="col-md-3">
        {!! Form::number('numero',null,['class' => 'form-control boxed '.($errors->has('numero')?'is-invalid':''),'min' => '1', 'max' => '50']) !!}
        <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('estado', 'Estado', ['class' => 'col-md-4 form-control-label text-xs-right']) !!}
    <div class="col-md-8">
        <label>
            {!! Form::radio('estado',1, true,['class' => 'radio squared estado1']) !!}
            <span>Activo</span>
        </label>
        <label>
            {!! Form::radio('estado',0, false,['class' => 'radio squared estado0']) !!}
            <span>Inactivo</span>
        </label>
    </div>
</div>
