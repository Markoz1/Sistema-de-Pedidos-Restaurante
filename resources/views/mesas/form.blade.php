
<div class="form-group row">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-3 form-control-label text-xs-right']) !!}
    <div class="col-md-2">
        {!! Form::text('nombre', 'Mesa', ['class' => 'form-control boxed', 'readonly' => 'readonly']) !!}        
    </div>
    <div class="col-md-3">
        {!! Form::number('numero',null,['class' => 'form-control boxed '.($errors->has('numero')?'is-invalid':''),'min' => '1', 'max' => '50']) !!}
        <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('estado', 'Estado', ['class' => 'col-md-3 form-control-label text-xs-right']) !!}
    <div class="col-md-8">
        <label>
            {!! Form::radio('estado','1', true,['class' => 'radio squared']) !!}
            <span>Activo</span>
        </label>
        <label>
            {!! Form::radio('estado','0',false,['class' => 'radio squared']) !!}
            <span>Inactivo</span>
        </label>
    </div>
</div>
<div class="form-group row mt-4">
    <div class="col-sm-10 col-sm-offset-2">
        <button type="submit" class="btn btn-primary"> Crear </button>
    </div>
</div>
