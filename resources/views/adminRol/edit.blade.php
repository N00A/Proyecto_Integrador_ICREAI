@extends('layouts.layout')
@section('title','Icreai_Editions_Rol')
@section('title_princ','Edición de Roles')
@section('pp')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                <div class="panel-heading">
                    <h3 class="panel-title negrita">Editar Rol Del Usuario</h3>
                </div>
                <div class="panel-body tetxCenter">
                    <div class="table-container">
                        <form method="POST" action="{{ route('rol.update',$roles->id) }}" role="form">
                            {{ csrf_field() }}
                            <h4 class="textCenter">Moderador (1) Usuario Normal (2) Administrador (3)</h4>
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="number" min="1" max="3" name="role_id" id="role_id" class="form-control inputsm textCenter" value="{{$roles->role_id}}">
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                            </br>
                            </br>
                            <a href="{{ route('rol.index') }}" class="btn btn-info btnblock">Atrás</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection