@extends('layouts.layout')
@section('title','Icreai_Profile')
@section('title_princ','Profile')
@section('pp')



<img width="100px" height="100px" src="{{ asset('uploads/avatars/'.$user->avatar) }}">
<h2>("Titulo del avatar")</h2>
<h4>Coming Soon</h4>
</br>
</br>
<h4>Edit avatar</h4>
{{ Form::open(['route' => ['user.profile.update'], 'files' => true, 'method' => 'PATCH']) }}
<p>{{ Form::file('avatar') }}</p>
<p>{{ Form::submit('Update', ['name' => 'submit']) }}</p>
{{ Form::close() }}
@endsection