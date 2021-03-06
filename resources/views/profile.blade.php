@extends('layouts.layout')
@section('title','Icreai_Profile')
@section('title_princ','Perfil')
@section('pp')

<div class="container mainContainer">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 formSeparacion">
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
            <div class="panel panel-default formSeparacion">
                <h3 class="negrita">Foto</h3>
                <img width="100px" height="100px" src="{{ asset('uploads/avatars/'.$user->avatar) }}">
                <div class="panel-body">
                    <div class="row">
                        {{ Form::open(['route' => ['user.profile.update'], 'files' => true, 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h4>Selecciona una foto</h4>
                                    <span class="mi-archivo">
                                        <input class="selectorFoto" type="file" name="avatar" id="mi-archivo">
                                    </span>

                                    <label for="mi-archivo">
                                        <span>Seleccionar Archivo</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h2 class="negrita">Datos</h2>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h4>Nombre</h4>
                                    <input type="text" name="name" id="name" class="form-control inputsm" value="{{$user->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h4>Correo</h4>
                                    <input type="text" name="email" id="email" class="form-control inputsm" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit" value="Guardar Datos" class="btn btn-success btn-block">
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
<!-- {{ Form::submit('Update', ['name' => 'submit']) }}-->