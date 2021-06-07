@extends('layouts.layout')
@section('title','Icreai Generos')
@section('title_princ','Administrar Generos')
@section('pp')
<div class="row marginAuto">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <a href="{{ route('genero.create') }}">
            <button class="btn btn-success colorbtn">Añadir Nuevo Género</button></a>
    </div>
</div>
<div class="row marginAuto">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <h2 class="textCenter negrita">Listado de Géneros</h2>
            <table class="table  table-bordered table-condensed table-hover textCenter">
                <thead >
                    <th class="textCenter">Id</th>
                    <th class="textCenter">Género</th>
                    <th class="textCenter">Descripción</th>
                    <th class="textCenter">Opciones</th>
                </thead>
                @foreach ($genero as $genero)
                <tr>
                    <td>{{ $genero->id}}</td>
                    <td>{{ $genero->name}}</td>
                    <td>{{ $genero->descripcion}}</td>
                    <td >
                        <a href="{{URL::action('GeneroController@edit',$genero->id)}}">
                            <button class="btn btn-info colorbtn">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$genero->id}}" data-toggle="modal">
                            <button class="btn btn-danger colorbtn">Eliminar</button></a>
                    </td>
                </tr>
                @include('genero.modal')
                @endforeach
            </table>
        </div>
        {{$genero->render()}}
    </div>
</div>

@endsection