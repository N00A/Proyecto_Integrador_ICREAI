@extends('layouts.layout')
@section('title','Icreai_Mod')
@section('title_princ','Editar Estados')
@section('pp')

<div class="row" style="margin-left: 300px;">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        
        @include('mod.search')
    </div>
</div>
<br>
<div class="row" style="margin: 0 auto;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
        <h2 style="text-align: center;">Listado de Usuarios</h2>
            <table class="table  table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
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