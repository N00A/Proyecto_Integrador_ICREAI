@extends('layouts.layout')
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
                <h1 class="negrita">Escrito</h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    {!!Form::open(array('url'=>'/pdf','method'=>'GET','target'=>'_blank','autocomplete'=>'off'))!!}

                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group break-word">

                        @if($escritos->count())

                        <h3>¡Comenzemos a LEER!</h3><br>

                        @foreach($escritos as $escrito)

                        <h4 class="textJutificado">{{$escrito->texto}}</h4>

                        @endforeach

                        @else

                        <h3 colspan="8"> SORRY, No hay registros todavia TwT!!</h3>

                        @endif

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="hidden" name="genero_id_pdf" id="genero_id_pdf" class="form-control inputsm" value="{{$genero_id}}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger negrita">
                                Descargar PDF
                            </button>
                        </div>
                        <div class="btn-group">
                            <a style="width: 138px;" href="{{ route('inicio') }}" class="btn btn-info negrita">Volver al inicio</a>
                        </div>
                    </div>

                    {!!Form::close()!!}
                    <br>
                    <br>
                    <h3 style="color:blacky">¡Conversa con otros escritores!</h3><br>
                    <div class="mensaje">
                        @if($mensaje->count())
                        <div class="mensaje_title">
                        
                        
                        <h3 colspan="8" class="negrita">Mensaje</h3>
                        </div>
                        <br>
                        
                        @foreach($mensaje as $comentario)
                        <div class="mensaje-style">
                        <h4 class="textJutificado">{{$comentario->contenido}}</h4>
                        <h5 class="textJutificado negrita">{{$comentario->created_at}}</h5>
                         </div>
                        @endforeach
                       
                        @else

                        <h3 colspan="8">¡No hay Comentarios todavia!</h3>

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
                                 <input type="text" name="contenido" id="contenido" class="form-control inputsm" placeholder="Habla aquí con otros escritores">
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success negrita">
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
    @endsection