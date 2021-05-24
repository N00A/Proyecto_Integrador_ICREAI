@extends('layouts.layout')
@section('title','Icreai Inicio')
@section('pp')
<div class="alert alert-danger" role="alert">
    <h3>No esta autorizado para acceder a esta funciòn</h3>
</div>
<div class="links">
    <a href="{{ route('inicio') }}" class="btn btn-danger btnblock">Continuar</a>
</div>
@endsection