@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3>Descripción del problema:</h3>
    </div>
    <br><br>
    <form method="post" action="{{ url('/'.$project->id.'/eview') }}">
        @csrf
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Nombre del proyecto:</span>
        </div>
        <input type="text" class="form-control" name="name_problem" required value="{{$project->name_problem}}">
    </div>
    <br><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Descripción del proyecto:</span>
        </div>
        <input type="text" class="form-control" name="desc_problem" required value="{{$project->desc_problem}}">
    </div>
    <br><br>


        <a class="btn btn-danger" href="{{ url('/home') }}" style="float: left;">Regresar</a>
        <button class="btn btn-success" style="float: right">Siguiente</button>

    
    
    </form>


</div>
@endsection
