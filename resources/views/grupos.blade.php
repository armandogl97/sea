@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3>Grupo {{$letra}}</h3>
    </div>
<form method="post" action="{{'/rpt/'.$id.'/'.$letra.'/add'}}">
@csrf
<div class="input-group" style="width: 25%">
        <div class="input-group-prepend">
            <span class="input-group-text">Agregar:</span>
        </div>
        <input type="text" class="form-control" name="name_g" autofocus required="">
        <input type="hidden" name="rpt" value="{{ $id }}">
        <input type="hidden" name="letra" value="{{ $letra }}">
        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
            <i class="material-icons">edit</i>
        </button>
    </div>
</form>

    <div class="row justify-content-center">
            <table class="table" style="width:40%">
                <thead>
                    <tr>
                        <th width="30%">Elementos agrupados:</th>
                        <th class="text-right" width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gs as $g)
                    <tr>
                        <td style="padding: 0">
                            <span>{{$g->texto}}
                            </span>
                        </td>
                        <td class="td-actions text-right" style="padding: 0">
                            <form style="margin-bottom: 0" method="post" action="{{'/rpt/'.$id.'/'.$letra.'/'.$g->id}}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar">
                                <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach                  
                </tbody>
            </table>
        </div>
        <a class="btn btn-success" href="{{ url('/rpt/'.$id) }}" style="float: right;margin-right: 10px">Confirmar</a>

    

</div>
@endsection