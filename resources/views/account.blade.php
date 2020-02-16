@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')

<div class="container">

  <div class="row justify-content-center">
    <h3>Mi cuenta</h3>
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Nombre:</span>
    </div>
    <span>{{$user->name}}</span>
</div><br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">E-mail:</span>
    </div>
    <span>{{$user->email}}</span>
</div><hr>


<h4><b>Cambiar mi contraseña:</b></h4>
@if (Session::has('message'))
<div class="text-danger">
 {{Session::get('message')}}
</div>
@endif
@if (Session::has('status'))
<div class='text-success' style="text-align: center;">
    {{Session::get('status')}}
</div>
@endif
<form method="post" action="{{url('/updatepassword')}}">
 {{csrf_field()}}
 <div class="row">

    <div class="col-md-4" style="text-align: center;">
      <span>Introduce tu actual contraseña:</span>
      <input style="text-align: center;" type="password" name="mypassword" class="form-control">
      <div class="text-danger">{{$errors->first('mypassword')}}</div>
  </div>

  <div class="col-md-4" style="text-align: center;">
      <span for="password">Introduce tu nueva contraseña:</span>
      <input style="text-align: center;" type="password" name="password" class="form-control">
      <div class="text-danger">{{$errors->first('password')}}</div>
  </div>

  <div class="col-md-4" style="text-align: center;">
      <span for="mypassword">Confirma tu nuevo password:</span>
      <input style="text-align: center;" type="password" name="password_confirmation" class="form-control">
  </div>
</div>

<div class="row justify-content-center" style="margin-top: 5%">
    <button type="submit" class="btn btn-success">Cambiar contraseña</button>
</div>

</form>



@endsection
