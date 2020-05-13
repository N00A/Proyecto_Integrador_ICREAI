@extends('layouts.layout')
@section('title','Icreai_Mod')
@section('title_princ','Mod Center')
@section('pp')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Usuarios</h3>
        @include('mod.search')
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Activo</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($users as $user)
                <tr>
                    
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->activo}}</td>
                    <td>
                        <a href="{{URL::action('ModController@edit',$user->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        {{$users->render()}}
    </div>
</div>

@endsection