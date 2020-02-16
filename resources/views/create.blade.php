@extends('layouts.app')
@section('title','SEA | Agregar Proyecto')
@section('body-class','project-page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3>Registrar Proyecto</h3>
    </div>
  <br><br>
    <form method="post" action="{{ url('/home') }}">
        @csrf
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Nombre del proyecto:</span>
        </div>
        <input type="text" class="form-control" name="name_problem" required autofocus>
    </div>
    <br><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Descripción del proyecto:</span>
        </div>
        <input type="text" class="form-control" name="desc_problem" required >
    </div>
  
    <br><br>

        <a class="btn btn-danger" href="{{ url('/home') }}" style="float: left;">Cancelar</a>
        <button class="btn btn-success" style="margin-left: 31%">Registrar Proyecto</button>

    
    </form>


</div>
@endsection
