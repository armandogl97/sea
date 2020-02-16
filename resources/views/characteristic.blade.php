@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3>Características fundamentales del proyecto: {{$titulo->name_problem}}</h3>
    </div>
<form method="post" action="{{'/'.$project_id.'/characteristic'}}">
@csrf
<div class="input-group" style="width: 25%">
        <div class="input-group-prepend">
            <span class="input-group-text">Agregar:</span>
        </div>
        <input type="text" class="form-control" name="name_c" autofocus required="">
        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
            <i class="material-icons">edit</i>
        </button>
    </div>
</form>

    <div class="row justify-content-center">
            <table class="table" style="width:40%">
                <thead>
                    <tr>
                        <th width="30%">Característica fundamental</th>
                        <th class="text-right" width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characteristics as $characteristic)
                    <tr>
                        <td style="padding: 0">
                            <a href="{{ '/'.$characteristic->project_id.'/characteristic/'.$characteristic->id.'/elements' }}" rel="tooltip" style="color: darkgreen">{{$characteristic->name_c}}
                            </a>
                        </td>
                        <td class="td-actions text-right" style="padding: 0">
                            <form style="margin-bottom: 0" method="post" action="{{'/'.$characteristic->project_id.'/characteristic/'.$characteristic->id.'/delete'}}">
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
        <a class="btn btn-danger" href="{{ url('/'.$project_id.'/eview') }}" style="float: left;">Regresar</a>

        <a class="btn btn-success" href="{{ url('/'.$project_id.'/diagram') }}" style="float: right;">SIGUIENTE</a>
    

</div>
@endsection