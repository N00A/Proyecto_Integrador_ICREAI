@extends('layouts.layout')
@section('title','Icreai Editar Roles')
@section('title_princ','Edición de Roles')
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
                <div class="panel-body tetxCenter">
                    <div class="table-container">
                        <form method="POST" action="{{ route('rol.update',$roles->id) }}" role="form" class="textCenter marginAuto">
                            {{ csrf_field() }}
                            <h4 class="textCenter">Moderador (1), Usuario Normal (2), Administrador (3).</h4>
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <input type="number" min="1" max="3" name="role_id" id="role_id" class="form-control inputsm textCenter" value="{{$roles->role_id}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Actualizar" class="btn btn-success colorbtn">
                                <a href="{{ route('rol.index') }}" class="btn btn-info colorbtn">Atrás</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection