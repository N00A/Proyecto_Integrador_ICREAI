@extends('layouts.layout')
@section('title','Icreai_Admin')
@section('title_princ','Añadir Generos')
@section('pp')
<div class="mainContainer">
    <section class="content">
        <div class="col-xs-12 col-sm-12 col-md-6">
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
                <div class="panel-body">
                    <div class="row">
                        <form method="POST" action="{{ route('genero.store') }}" role="form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <h4>Género</h4>
                                        <input class="form-control inputsm cajasGrandes" type="text" name="name" id="name" placeholder="Nombre del Género">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <h4>Descripción</h4>
                                        <textarea class="form-control cajasGrandes" name="descripcion" id="descripcion" rows="10" cols="40" placeholder="Ingresa una descripción"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <input type="submit" value="Registrar" class="btn btn-success sizeBtnSuccess"><br><br>
                                <a href="{{ route('genero.index') }}" class="btn btn-info btnblock">Atrás</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection