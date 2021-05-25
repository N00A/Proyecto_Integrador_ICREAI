@extends('layouts.layout')
@section('title','Icreai Editar Usuarios')
@section('title_princ','Editar Usuario')
@section('pp')
<div class="row">
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('administrador.update',$users->id) }}" role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4 class="textCenter">Nombre</h4>
                                        <input type="text" name="name" id="name" class="form-control inputsm" value="{{$users->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4 class="textCenter">Correo</h4>
                                        <input type="text" name="email" id="email" class="form-control inputsm" value="{{$users->email}}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <h4 class="textCenter">Activo (1), Inactivo (0).</h4>
                                        <input type="number" min="0" max="1" name="activo" id="activo" class="form-control inputsm" value="{{$users->activo}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Actualizar" class="btn btn-success colorbtn">
                                <a href="{{ route('administrador.index') }}" class="btn btn-info colorbtn">Atrás</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection