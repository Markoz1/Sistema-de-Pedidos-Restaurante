
<div class="form-group row">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 form-control-label text-xs-right required']) !!}
    <div class="col-md-3">
        {!! Form::text('nombre', 'Mesa', ['class' => 'form-control boxed', 'readonly' => 'readonly']) !!}        
    </div>
    <div class="col-md-3">
        {!! Form::number('numero',null,['class' => 'form-control boxed '.($errors->has('numero')?'is-invalid':''),'min' => '1', 'max' => '50']) !!}
        <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
    </div>
</div>
