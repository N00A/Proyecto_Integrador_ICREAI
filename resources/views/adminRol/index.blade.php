@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Administrar Roles')
@section('pp')

<div class="row" style="margin-left: 300px;">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
       
        @include('adminRol.search')


    </div>
</div>
<div class="row" style="margin: 0 auto;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
        <h2 style="text-align: center;">Listado de Roles</h2>
            <table class="table  table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Role_Id</th>
                    <th>User_Id</th>
                    <th>Opciones</th>
                </thead>

                
                @foreach ($roles as $rol)
                <tr>
                    <td>{{ $rol->id}}</td>
                    <td>{{ $rol->role_id}}</td>
                    <td>{{ $rol->user_id}}</td>
                    <td>
                        <a href="{{URL::action('RolController@edit',$rol->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                    </td>
                </tr>
                @include('adminRol.modal')
                @endforeach
            </table>
        </div>

    </div>
</div>

@endsection