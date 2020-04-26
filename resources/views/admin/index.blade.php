@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Admin Center')
@section('pp')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Usuarios</h3>
        @include('admin.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Date Creation</th>
                    <th>Date Updated</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->password}}</td>
                    <td>{{ $user->created_at}}</td>
                    <td>{{ $user->updated_at}}</td>
                    <td>
                        <a href="{{URL::action('UserController@edit',$user->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('admin.modal')
                @endforeach
            </table>
        </div>
        {{$users->render()}}
    </div>
</div>

@endsection