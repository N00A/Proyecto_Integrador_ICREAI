@extends('layouts.layout')
@section('title','Icreai Inicio')
@section('pp')
<div class="alert alert-danger" role="alert">
    <h3>No está autorizado para acceder a esta función.</h3>
    <h4>Si deseas convertirte en moderador escríbenos a: noreply.icreai@gmail.com</h4>
</div>
<div class="links">
    <a href="{{ route('inicio') }}" class="btn btn-danger btnblock colorbtn">Continuar</a>
</div>
@endsection