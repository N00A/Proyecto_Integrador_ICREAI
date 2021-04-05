@extends('layouts.layout')
@section('pp')

<div class="go-top-container">
    <div class="go-top-button">
        <i class="fa fa-arrow-circle-up"></i>
    </div>
</div>

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
                    <br>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="hidden" name="id_Genero" id="id_Genero" class="form-control inputsm" value="{{$id}}">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection