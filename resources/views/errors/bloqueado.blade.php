@extends('layouts.app')
@section('content')
<div class="alert alert-danger" role="alert">
    <h3>Usuario Bloqueado por algùn mal comportamiento</h3>
</div>
<div class="links">
    <a href="{{ route('login') }}" class="btn btn-danger btnblock">Continuar</a>
</div>
@endsection