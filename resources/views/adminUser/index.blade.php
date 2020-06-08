@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Administrar Usuarios')
@section('pp')

<div class="row" style="margin-left: 300px;">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

        @include('adminUser.search')

        <a href="{{ route('rol.index') }}">
            <button class="btn btn-success">Gestionar Roles</button></a>

        <a href="{{ route('genero.index') }}">
            <button class="btn btn-success">Gestionar Generos</button></a>


    </div>
</div>
<br>
<div class="row" style="margin: 0 auto;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <h2 style="text-align: center;">Listado de Usuarios</h2>
            <table class="table  table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Opciones</th>
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