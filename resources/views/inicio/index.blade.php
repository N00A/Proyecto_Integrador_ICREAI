@extends('layouts.nav')
@section('title','Icreai_Inicio')
@section('contenido_inicio')
@endsection
@extends('layouts.layout')
@section('pp')
<div class="row" style="text-align: center; margin-left: 300px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div role="alert">
                        <h1 id="tituloIcre" class="elegantshadow">Bienvenido A Icreai</h1>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <br>
                    <h3>Selecciona un género de tu interés y empieza a escribir</h3><br>

                    {!!Form::open(array('url'=>'escrito/create','method'=>'GET','autocomplete'=>'off'))!!}
                    <div class="form-group">
                        <select type="text" name="genero" id="genero" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Seleccione un Genero</option>
                            @foreach($genero as $gne)
                            <option value="{{$gne->id}}">{{ $gne->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" style="width:555px; color:black">
                            <h4 style="font-weight: bold;">¡¡ Comenzar !!</h4>
                        </button></a>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection