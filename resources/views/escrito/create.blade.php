@extends('layouts.layout')
@section('pp')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-1">
            @if($user_id!=$ultId)
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif

            <div class="panel panel-default formSeparacion">

                <div>
                    <table id="mytable" class="table table-bordred">
                        <thead>
                            <th>

                                @foreach($genero as $genero)

                                <h3 class="alert alert-info informaciones">Género Seleccionado:</h3>

                                <h3>{{$genero->name}}</h3>

                                <h3 class="alert alert-info informaciones">¿De que trata?</h3>
                                <h4>{{$genero->descripcion}}</h4>

                                @endforeach


                            </th>
                        </thead>
                        <tbody>


                            @if($escrito->count() and $corte!=null)

                            @foreach($escrito as $escrito)

                            <tr>

                                <td>
                                    <h3 class="alert alert-info informaciones">Asì va la historia:</h3>

                                    <h4 class="textJutificado">{{\Illuminate\Support\Str::substr($escrito->texto,$corte)}}</h4>
                                    <!-- {{\Illuminate\Support\Str::substr($escrito->texto,300)}}-->
                                    <!-- {{\Illuminate\Support\Str::length($escrito->texto)/33}}-->
                                </td>



                            </tr>
                            @break
                            @endforeach
                            @else

                            <tr>
                                <td class="alert alert-info informaciones">¡Genial eres el primero(a) en escribir!</td>

                            </tr>


                            <tr>

                                <td class="alert alert-warning informaciones">Dale comienzo a una GRAN HISTORIA</td>

                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="table-container">
                        <form method="POST" action="{{ route('escrito.store') }}" role="form" id="formA">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control cajaEscrito textJutificado" name="texto" id="texto" rows="10" cols="40" placeholder="Continua la historia"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row textCenter">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="negrita infoCaracteres">Caracteres minimos: 100,</label>
                                        <label id="caracteres" class="negrita infoCaracteres"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" id="user_id" class="form-control inputsm" value="{{ Auth::user()->id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">

                                        <input type="hidden" name="genero_id" id="genero_id" class="form-control inputsm" value="{{$genero->id}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Enviar" class="btn btn-success btn-block"><br>
                                    <a href="{{ route('inicio') }}" class="btn btn-info btnblock">Atrás</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="textCenter">
                    <h3 colspan="8" class="negrita">¡LO SENTIMOS! aún no puedes volver a escribir</h3>
                    <P>Espera hasta que otra persona continue la historia</P>
                    @foreach($genero as $genero)
                    @endforeach
                    <form method="GET" action="{{ route('escrito.index') }}" role="form" id="formB">


                        <input type="hidden" name="genero_id" id="genero_id" class="form-control inputsm" value="{{$genero->id}}">
                        <input type="submit" value="Ir al cadaver Exquisito" class="btn btn-success btn-block">

                    </form>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection