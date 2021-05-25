@extends('layouts.layout')
@section('title','Icreai Cadaver Exquisito')
@section('pp')

<div class="go-top-container">
    <div class="go-top-button">
        <i class="fa fa-arrow-circle-up"></i>
    </div>
</div>
<link href="{{asset('css/styleMensaje.css')}}" rel="stylesheet">
<div class="mainContainer">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="text-align: left;">
                <h1 class="negrita">Cadáver Exquisito</h1>
            </div><br>
            <div style="text-align: left;">
                <a class="btn btn-success colorbtn" href="#mensaje">Ir a los mensajes</a>
            </div><br>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!!Form::open(array('url'=>'/pdf','method'=>'GET','target'=>'_blank','autocomplete'=>'off'))!!}

                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group break-word">

                        @if($escritos->count())

                        <h3>¡Comencemos  a Leer!</h3><br>

                        @foreach($escritos as $escrito)

                        @if($escrito->activo==0)

                        @if($rol==3)
                        <span class="negrita nameCe">#{{$escrito->user_id}} -{{$escrito->name}}</span>
                        <h4 class="textJutificado interlineado inactivo">{{$escrito->texto}}</h4>
                        @endif

                        @else
                        @if($rol==1 || $rol==3)
                        <span class="negrita nameCe">#{{$escrito->user_id}} -{{$escrito->name}}</span>
                        @endif

                        <h4 class="textJutificado interlineado">{{$escrito->texto}}</h4>

                        @endif

                        @if($rol==3)

                        <a href="" data-target="#modal-delete-{{$escrito->id}}" data-toggle="modal">
                            <button class="btn btn-danger colorbtn">Eliminar</button></a><br><br>
                           
                        @endif
                        
                        
                        @endforeach

                        @else

                        <h3 colspan="8"> SORRY, No hay registros todavia TwT!!</h3>

                        @endif

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="hidden" name="genero_id_pdf" id="genero_id_pdf" class="form-control inputsm" value="{{$genero_id}}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" id="btOcultar">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger negrita colorbtn">
                                Descargar PDF
                            </button>
                        </div>
                        <div class="btn-group">
                            <a style="width: 138px;" href="{{ route('inicio') }}" class="btn btn-info negrita colorbtn">Volver al  inicio</a>
                        </div>
                    </div><br>
                    
                    {!!Form::close()!!}
                    <br>
                    <br>
                    <h3 style="color:blacky">¡Opina sobre el escrito!</h3><br>
                    <a name="mensaje"></a>
                    <div class="mensaje">
                        @if($mensaje->count())
                        <div class="mensaje_title">


                            <h3 colspan="8" class="negrita">Mensajes</h3>

                        </div>
                        <br>

                        @foreach($mensaje as $comentario)
                        
                        <div class="mensaje-style">
                            <img width="50px" height="50px" src="{{ asset('uploads/avatars/'.$comentario->avatar) }}">
                            <h4 class="textJutificado negrita">{{$comentario->name}}<span>:</span></h4>
                            <h4 class="textJutificado">{{$comentario->contenido}}</h4>
                            <h5 class="textJutificado negrita">{{$comentario->created_at}}</h5>
                        </div>

                        @endforeach

                        @else

                        <h3 colspan="8">¡No hay Mensajes todavia!</h3>

                        @endif
                    </div>

                    <div class="form-group">

                        {!!Form::open(array('url'=>'/mensaje','method'=>'POST','target'=>'_self','autocomplete'=>'off'))!!}

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="hidden" name="genero_id" id="genero_id" class="form-control inputsm" value="{{$genero_id}}">
                            <input type="hidden" name="user_id" id="user_id" class="form-control inputsm" value="{{ Auth::user()->id}}">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">


                            <div class="form-group">
                                <div class="mensaje-style">
                                    <input type="text" name="contenido" id="contenido" class="form-control inputsm" placeholder="Comenta aquí">
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success negrita colorbtn">
                                    Enviar
                                </button>
                            </div>
                        </div>
                        {!!Form::close()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('escrito.modal')
    @endsection