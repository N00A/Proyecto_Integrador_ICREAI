@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Administrar Usuarios')
@section('pp')

<div class="row textCenter">
    <div class="barrasDeBusq">

        @include('adminUser.search')

        <a href="{{ route('rol.index') }}">
            <button class="btn btn-success btnsDeGestion">Gestionar Roles</button></a>

        <a href="{{ route('genero.index') }}">
            <button class="btn btn-success btnsDeGestion">Gestionar Generos</button></a>


    </div>
</div>
<br>
<div class="row" style="margin: 0 auto;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <h2 class="textCenter negrita">Listado de Usuarios</h2>
            <h4>Estado: Activo (1) Inactivo (0)</h4>
            <table class="table  table-bordered table-condensed table-hover textCenter">
                <thead>
                    <th class="textCenter">Id</th>
                    <th class="textCenter">Nombre</th>
                    <th class="textCenter">Correo</th>
                    <th class="textCenter">Estado</th>
                    <th class="textCenter">Opciones</th>
                </thead>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->activo}}</td>
                    <td>
                        <a href="{{URL::action('AdminController@edit',$user->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('adminUser.modal')
                @endforeach
            </table>
        </div>
        {{$users->render()}}
    </div>
</div>

@endsection