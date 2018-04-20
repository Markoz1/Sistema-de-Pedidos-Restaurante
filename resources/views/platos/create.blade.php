@extends('layout.main')
@section('content')
    <article class="content item-editor-page">
        <div class="title-block">
            <h3 class="title"> Nuevo Plato
                <span class="sparkline bar" data-type="bar"></span>
            </h3>
        </div>
        {!! Form::open(['route' => 'menu.store', 'method' => 'post', 'files' => true]) !!}
        <form name="item">
            <div class="card card-block">
                <div class="form-group row">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('nombre', null, ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':'')]) !!}
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('precio', 'Precio', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="input-group col-sm-10">                        
                        {!! Form::number('precio', null, ['class' => 'form-control boxed '.($errors->has('precio')?'is-invalid':''), 'min' => '0', 'step' => '0.01']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="precio">BOB</span>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('precio') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('id_categoria', 'Categoría', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('id_categoria',$categorias, null, 
                        ['class' => 'form-control boxed '.($errors->has('id_categoria')?'is-invalid':''), 
                        'placeholder' => (count($categorias) === 0)?'Ninguna categoria añadida':'Selecciona una Categoria']) !!}
                        <div class="invalid-feedback">{{ $errors->first('id_categoria') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('descripcion', 'Descripción', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('descripcion', null, 
                        ['class' => 'form-control boxed '.($errors->has('descripcion')?'is-invalid':''), 'placeholder' => 'Escribe una breve descripción...', 'rows' => '3']) !!}
                        <div class="invalid-feedback">{{ $errors->first('descripcion') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('foto', 'Foto', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::file('foto', ['class' => 'form-control boxed '.($errors->has('foto')?'is-invalid':''), 'accept' => 'image/*']) !!}
                        <div class="invalid-feedback">{{ $errors->first('foto') }}</div>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right"> Images: </label>
                    <div class="col-sm-10">
                        <div class="images-container">
                            <div class="image-container">
                                <div class="controls">
                                    <a href="" class="control-btn move">
                                                        <i class="fa fa-arrows"></i>
                                                    </a>
                                    <!--
    								-->
                                    <a href="" class="control-btn star">
                                                        <i class="fa"></i>
                                                    </a>
                                    <!--
    								-->
                                    <a href="#" class="control-btn remove" data-toggle="modal" data-target="#confirm-modal">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                </div>
                                <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')"></div>
                            </div>
                            <div class="image-container">
                                <div class="controls">
                                    <a href="" class="control-btn move">
                                                        <i class="fa fa-arrows"></i>
                                                    </a>
                                    <!--
    								-->
                                    <a href="" class="control-btn star">
                                                        <i class="fa"></i>
                                                    </a>
                                    <!--
    								-->
                                    <a href="#" class="control-btn remove" data-toggle="modal" data-target="#confirm-modal">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                </div>
                                <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')"></div>
                            </div>
                            <div class="image-container">
                                <div class="controls">
                                    <a href="" class="control-btn move">
                                                        <i class="fa fa-arrows"></i>
                                                    </a>
                                    <!--
    								-->
                                    <a href="" class="control-btn star">
                                                        <i class="fa"></i>
                                                    </a>
                                    <!--
    								-->
                                    <a href="#" class="control-btn remove" data-toggle="modal" data-target="#confirm-modal">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                </div>
                                <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')"></div>
                            </div>
                            <a href="#" class="add-image" data-toggle="modal" data-target="#modal-media">
                                <div class="image-container new">
                                    <div class="image">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
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
    {{-- <div class="modal fade" id="modal-media">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Media Library</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                </div>
                <div class="modal-body modal-tab-container">
                    <ul class="nav nav-tabs modal-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                        </li>
                    </ul>
                    <div class="tab-content modal-tab-content">
                        <div class="tab-pane fade" id="gallery" role="tabpanel">
                            <div class="images-container">
                                <div class="row">
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="image-container">
                                            <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="upload" role="tabpanel">
                            <div class="upload-container">
                                <div id="dropzone">
                                    <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                        <div class="dz-message-block">
                                            <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Insert Selected</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="confirm-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-warning"></i> Alert</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to do this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal --> --}}
@endsection
