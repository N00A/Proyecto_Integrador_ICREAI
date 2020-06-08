@extends('layouts.layout')
@section('title','Icreai_Editions_Rol')
@section('title_princ','Editions Rol')
@section('pp')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Rol Del Usuario</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('rol.update',$roles->id) }}" role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="role_id" id="role_id" class="form-control inputsm" value="{{$roles->role_id}}">
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