@extends('layouts.app')
@section('title','Icreai Bloqueado')
@section('content')
<div class="alert alert-danger" role="alert">
    <h3>Usuario Bloqueado por algún mal comportamiento</h3>
</div>
<div class="links">
    <a href="{{ route('login') }}" class="btn btn-danger btnblock colorbtn">Continuar</a>
</div>
@endsection