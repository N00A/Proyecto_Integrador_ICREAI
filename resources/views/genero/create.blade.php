@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Añadir Generos')
@section('pp')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-1">
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
            <div class="panel panel-default" style="padding: 20px;">
                <div style="margin-top: 20px;">
                    <div class="table-container">
                        <form method="POST" action="{{ route('genero.store') }}" role="form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <h4>Gènero</h4>
                                        <input type="text" name="name" id="name" class="form-control inputsm" placeholder="Nombre del Gènero" style="width: 700px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <h4>Descripciòn</h4>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="10" cols="40" placeholder="Ingresa una descripciòn" style="width: 700px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Registrar" class="btn btn-success btn-block"><br>
                                    <a href="{{ route('genero.index') }}" class="btn btn-info btnblock">Atrás</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection