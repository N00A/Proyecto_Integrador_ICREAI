@extends('layouts.layout')
@section('title','Icreai Admin')
@section('title_princ','Administrar Roles')
@section('pp')

<div class="row textCenter">
    <div class="barrasDeBusq">

        @include('adminRol.search')


    </div>
</div>
<div class="row" style="margin: 0 auto;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <h2 class="textCenter negrita">Listado de Roles</h2>
        <h4>Roles: Moderador (1), Usuario Normal (2), Administrador (3).</h4>
        <div class="table-responsive">
            <table class="table  table-bordered table-condensed table-hover textCenter">
                <thead>

                    <th class="textCenter">Usuario Id</th>
                    <th class="textCenter">Nombre</th>
                    <th class="textCenter">Rol Id</th>
                    <th class="textCenter">Opciones</th>
                </thead>


                @foreach ($roles as $rol)
                <tr>
                    <td>{{ $rol->user_id}}</td>
                    <td>{{ $rol->name}}</td>
                    <td>{{ $rol->role_id}}</td>
                    <td>
                        <a href="{{URL::action('RolController@edit',$rol->id)}}">
                            <button class="btn btn-info colorbtn">Editar</button></a>
                    </td>
                </tr>
                @include('adminRol.modal')
                @endforeach
            </table>
        </div>
        {{$roles->render()}}
    </div>
</div>

@endsection