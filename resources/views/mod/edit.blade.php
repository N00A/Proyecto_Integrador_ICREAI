@extends('layouts.layout')
@section('title','Icreai_Estados')
@section('title_princ','Edit States')
@section('pp')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Estados Usuarios</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('moderador.update',$users->id) }}" role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <h4>Activo (1) Inactivo (0)</h4>
                                        <input type="number" name="activo" id="activo" class="form-control inputsm" value="{{$users->activo}}">
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                            </br>
                            </br>
                            <a href="{{ route('moderador.index') }}" class="btn btn-info btnblock">Atrás</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection