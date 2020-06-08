@extends('layouts.layout')
@section('title','Icreai_Editions')
@section('title_princ','Editar Generos')
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
                        <form method="POST" action="{{ route('genero.update',$genero->id) }}" role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <h4>Genero</h4>
                                        <input type="text" name="name" id="name" class="form-control inputsm" value="{{$genero->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <h4>Descripciòn</h4>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="10" cols="40" style="width: 700px;" style="text-align: left;">{{$genero->descripcion}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                    </br>
                                    </br>
                                    <a href="{{ route('genero.index') }}" class="btn btn-info btnblock">Atrás</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </section>
</div>

@endsection