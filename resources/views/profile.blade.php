@extends('layouts.layout')
@section('title','Icreai_Profile')
@section('title_princ','Profile')
@section('pp')

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <h3>Foto</h3>
                <img width="100px" height="100px" src="{{ asset('uploads/avatars/'.$user->avatar) }}">
                <h2>Datos</h2>

                <div class="panel-body">
                    <div class="table-container">
                        {{ Form::open(['route' => ['user.profile.update'], 'files' => true, 'method' => 'POST']) }}
                        <div class="row">
                            <h4>Selecciona una foto</h4>
                            <input type="file" name="avatar">
                            </br>
                            <h4>Nombre</h4>
                            <input type="text" name="name" id="name" class="form-control inputsm" value="{{$user->name}}">
                            </br>
                            <h4>Email</h4>
                            <input type="text" name="email" id="email" class="form-control inputsm" value="{{$user->email}}">
                            </br>
                            <h4>Password</h4>
                            <input type="text" name="password" id="password" class="form-control inputsm" value="{{$user->password}}">
                            </br>
                            <input type="submit" value="Guardar Datos" class="btn btn-success btn-block">
                            </br>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <!-- {{ Form::submit('Update', ['name' => 'submit']) }}-->