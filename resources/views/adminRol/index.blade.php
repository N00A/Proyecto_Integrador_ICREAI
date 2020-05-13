@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Admin Center')
@section('pp')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Roles</h3>
        @include('adminRol.search')


    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Email</th>
                    <th>Id</th>
                    <th>Role_Id</th>
                    <th>User_Id</th>
                    <th>Opciones</th>
                </thead>

                
                @foreach ($roles as $rol)
                <tr>
                    <td>
                    @foreach ($rol->users() as $u)
                    {{$u->name}}
                    @endforeach
                    </td>
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