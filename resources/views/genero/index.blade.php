@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Administrar Generos')
@section('pp')
<div class="row" style="margin: 0 auto;">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <a href="{{ route('genero.create') }}">
            <button class="btn btn-success">Añadir Nuevo Genero</button></a>
    </div>
</div>
<div class="row" style="margin: 0 auto;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <h2 style="text-align: center;">Listado de Generos</h2>
            <table class="table  table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Genero</th>
                    <th>Descripciòn</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($genero as $genero)
                <tr>
                    <td>{{ $genero->id}}</td>
                    <td>{{ $genero->name}}</td>
                    <td>{{ $genero->descripcion}}</td>
                    <td>
                        <a href="{{URL::action('GeneroController@edit',$genero->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$genero->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('genero.modal')
                @endforeach
            </table>
        </div>

    </div>
</div>

@endsection