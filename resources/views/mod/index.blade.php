@extends('layouts.layout')
@section('title','Icreai Moderar')
@section('title_princ','Editar Estados')
@section('pp')

<div class="row textCenter">
    <div class="barrasDeBusq">
        
        @include('mod.search')
    </div>
</div>
<br>
<div class="row marginAuto">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
        <h2 class="textCenter negrita">Listado de Usuarios</h2>
        <h4>Estado: Activo (1), Inactivo (0).</h4>
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
                        <a href="{{URL::action('ModController@edit',$user->id)}}">
                            <button class="btn btn-info colorbtn">Editar</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        {{$users->render()}}
    </div>
</div>

@endsection