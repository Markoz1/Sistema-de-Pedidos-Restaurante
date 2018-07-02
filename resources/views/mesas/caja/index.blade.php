@extends('layout.main') 
@section('content')
<article class="content items-list-page">   
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title"> Reserva de Mesas</h3>
                        <p class="title-description"> Seccion para ver el estado de reserva de las mesas</p>
                    </div>
                </div>
            </div>
        </div>       
        <section class="section">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-block ">
                            <div class="row">                                
                                @foreach ($mesas as $mesa)
                                    @if ($mesa->estado==0)
                                    @php $estado="danger";$bloqueado_cuenta="";$bloqueado_asignar="disabled";$id_cuenta=$mesa->cuenta_activa->id; @endphp  
                                    @else
                                    @php $estado="primary";$bloqueado_cuenta="disabled";$bloqueado_asignar="";$id_cuenta=0; @endphp
                                    @endif
                                {!! Form::open(['route' => 'cuentas.store', 'method' => 'post']) !!}                                                                        
                                <div class="card bg-light mb-3 border border-{{$estado}}" style="max-width: 20rem;margin:5px;">                                    
                                    {!! Form::hidden('cliente_id', "1") !!}
                                    {!! Form::hidden('mesa_id', $mesa->id)!!}
                                    {!! Form::hidden('estado_id', $mesa->estado)!!}
                                        <div class="card-body">
                                          <h1 class="card-title text-center text-{{$estado}}"><b>{{ $mesa->username }}</b></h1>
                                        </div>
                                        <table class="col-12">
                                            <tr>
                                                <td class="col-6">
                                                    <div class="col-6">                                        
                                                        <a href="{{ route('cuentas.show', ['id' => $id_cuenta ]) }}" class="btn btn-danger btn-lg rounded-s {{$bloqueado_cuenta}}" role="button"> Cuenta </a>
                                                    </div>
                                                </td>
                                                <td class="col-6">
                                                    <div class="col-6">                                                           
                                                        <input type="submit" name="enviar" role="button" value="Asignar" class="btn btn-info btn-lg rounded-s " {{$bloqueado_asignar}}>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </table><br>
                                </div>
                                {!! Form::close() !!}
                                @endforeach                                
                            </div>
                            {!! $mesas->appends($_GET)->links('pagination') !!}
                        </div>
                    </div>
                </div>
        </section>
       
    </article>
@endsection