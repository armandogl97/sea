@extends('layouts.app')
@section('title','SEA | Agregar Proyecto')
@section('body-class','project-page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3>{{$element->characteristic->name_c}} > {{$element->name_e}}</h3>
    </div>
    <form method="post" action="{{ url('/'.$project_id.'/table/'.$element->id.'/form') }}">
        @csrf
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Presión:</span>
            </div>
            <input type="text" class="form-control" name="pressure" value="{{$element->pressure}}">
        </div>
        <br>
        <div class="input-group" style="width: 20%">
            <div class="input-group-prepend">
                <span class="input-group-text">Estado:</span>
            </div>
            <select class="custom-select custom-select" name="state">
              <option selected>{{$element->state}}</option>
              <option value="+">+</option>
              <option value="Sin Efecto">Sin Efecto</option>
              <option value="-">-</option>
          </select>
      </div>
      <br>
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Impacto:</span>
        </div>
        <input type="text" class="form-control" value="{{$element->impact}}" name="impact">
    </div>
    <br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Respuesta:</span>
        </div>
        <input type="text" class="form-control" value="{{$element->response}}" name="response">
    </div>

    <br><br>

    <a class="btn btn-danger" href="{{ url('/'.$project_id.'/table') }}" style="float: left;">Cancelar</a>
    <button class="btn btn-success" style="margin-left: 31%">COMPLETAR</button>

    
</form>


</div>
@endsection
