@extends('layouts.nav')
@section('title','Icreai_Inicio')
@section('contenido_inicio')
@endsection
@extends('layouts.layout')
@section('pp')

<div class="textCenter">
    <div role="alert">
        <h1 id="tituloIcre" class="elegantshadow">Icreai</h1>
    </div>


    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <h3 class="textCenter negrita"><span class="p1">Mas alla</span> <span class="p3">de tu</span> <span class="p2">imaginación</span></h3><br><br>
    <h4>Selecciona un género de tu interés y empieza a escribir.</h4><br>

    {!!Form::open(array('url'=>'escrito/create','method'=>'GET','autocomplete'=>'off'))!!}

    <div class="form-group">
        <select type="text" name="genero" id="genero" class="form-control selectpicker listaInicio" data-live-search="true" required>
            <option value="">Seleccione un Género</option>
            @foreach($genero as $gne)
            <option value="{{$gne->id}}">{{ $gne->name }}</option>
            @endforeach
        </select>
        <input type="hidden" name="user_id" id="user_id" class="form-control inputsm" value="{{ Auth::user()->id}}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success form-control btnComenzar negrita">
            ¡¡ Comenzar !!
        </button></a>
    </div>
    <div class="form-group">
        <img class="oscurecer" width="230px" height="150px" src='/uploads/fondos/creativo.png'>
        <img class="oscurecer" width="230px" height="150px" src='/uploads/fondos/socializar.png'>
        <img class="oscurecer" width="230px" height="150px" src='/uploads/fondos/historia.png'>
    </div>

    {!!Form::close()!!}
</div>
@endsection