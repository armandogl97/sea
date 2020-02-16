@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')
<script>
window.onload=function(){
var pos=window.name || 0;
window.scrollTo(0,pos);
}
window.onunload=function(){
window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
}
</script>
<style type="text/css">
    table{
        table-layout: fixed;
        text-align:center;
    }
    th, td {
        word-wrap: break-word;
        vertical-align: middle;
    }
</style>
    <div class="container">
        <div class="row justify-content-center">
        <h3>Tabla FM-P-S-I-R del problema: {{$name_problem->name_problem}}</h3>
    </div>
</div>
<div class="wrapper">
        <table border="1" style="margin:0 auto" width="98%">
            <tr>
                <th style="width:26%" colspan="2">FUERZA MOTRIZ</th>
                <th style="width:20%">PRESIÓN</th>
                <th style="width:5%">ESTADO</th>
                <th style="width:23%">IMPACTO</th>
                <th style="width:26%">RESPUESTA</th>
            </tr>
            <!-- FIN DE HEADER DE TABLA ^ -->

            @foreach($esocials as $esocial)
            <tr>
                @if($esocial == $esocials[0])
                <th rowspan="{{$nsocial}}" style="padding: 0;">SOCIAL</th>
                @endif
                <td>
                    <a style="color:green" href="{{ url('/'.$project_id.'/table/'.$esocial->id.'/form') }}">{{$esocial->name_e}}</a>
                    <span style="font: 100% monospace;display: block;">{{$esocial->characteristic->name_c}}</span>
                </td>
                <td>{{$esocial->pressure}}</td>
                <td>{{$esocial->state}}</td>
                <td>{{$esocial->impact}}</td>
                <td>{{$esocial->response}}</td>
            </tr>
            @endforeach

            @foreach($eeconomicos as $eeconomico)
            <tr>
                @if($eeconomico == $eeconomicos[0])
                <th rowspan="{{$neconomico}}" style="padding: 0;">ECONOMICO</th>
                @endif
                <td>
                    <a style="color:green" href="{{ url('/'.$project_id.'/table/'.$eeconomico->id.'/form') }}">{{$eeconomico->name_e}}</a>
                    <span style="font: 100% monospace;display: block;">{{$eeconomico->characteristic->name_c}}</span>
                </td>
                <td>{{$eeconomico->pressure}}</td>
                <td>{{$eeconomico->state}}</td>
                <td>{{$eeconomico->impact}}</td>
                <td>{{$eeconomico->response}}</td>
            </tr>
            @endforeach

            @foreach($eculturals as $ecultural)
            <tr>
                @if($ecultural == $eculturals[0])
                <th rowspan="{{$ncultural}}" style="padding: 0;">CULTURAL</th>
                @endif
                <td>
                    <a style="color:green" href="{{ url('/'.$project_id.'/table/'.$ecultural->id.'/form') }}">{{$ecultural->name_e}}</a>
                    <span style="font: 100% monospace;display: block;">{{$ecultural->characteristic->name_c}}</span>
                </td>
                <td>{{$ecultural->pressure}}</td>
                <td>{{$ecultural->state}}</td>
                <td>{{$ecultural->impact}}</td>
                <td>{{$ecultural->response}}</td>
            </tr>
            @endforeach

            @foreach($epoliticos as $epolitico)
            <tr>
                @if($epolitico == $epoliticos[0])
                <th rowspan="{{$npolitico}}" style="padding: 0;">POLITICO</th>
                @endif
                <td>
                    <a style="color:green" href="{{ url('/'.$project_id.'/table/'.$epolitico->id.'/form') }}">{{$epolitico->name_e}}</a>
                    <span style="font: 100% monospace;display: block;">{{$epolitico->characteristic->name_c}}</span>
                </td>
                <td>{{$epolitico->pressure}}</td>
                <td>{{$epolitico->state}}</td>
                <td>{{$epolitico->impact}}</td>
                <td>{{$epolitico->response}}</td>
            </tr>
            @endforeach

            @foreach($eleyess as $eleyes)
            <tr>
                @if($eleyes == $eleyess[0])
                <th rowspan="{{$nleyes}}" style="padding: 0;">LEYES-INSTITUCIONAL</th>
                @endif
                <td>
                    <a style="color:green" href="{{ url('/'.$project_id.'/table/'.$eleyes->id.'/form') }}">{{$eleyes->name_e}}</a>
                    <span style="font: 100% monospace;display: block;">{{$eleyes->characteristic->name_c}}</span>
                </td>
                <td>{{$eleyes->pressure}}</td>
                <td>{{$eleyes->state}}</td>
                <td>{{$eleyes->impact}}</td>
                <td>{{$eleyes->response}}</td>
            </tr>
            @endforeach

            @foreach($esaluds as $esalud)
            <tr>
                @if($esalud == $esaluds[0])
                <th rowspan="{{$nsalud}}" style="padding: 0;">SALUD</th>
                @endif
                <td>
                    <a style="color:green" href="{{ url('/'.$project_id.'/table/'.$esalud->id.'/form') }}">{{$esalud->name_e}}</a>
                    <span style="font: 100% monospace;display: block;">{{$esalud->characteristic->name_c}}</span>
                </td>
                <td>{{$esalud->pressure}}</td>
                <td>{{$esalud->state}}</td>
                <td>{{$esalud->impact}}</td>
                <td>{{$esalud->response}}</td>
            </tr>
            @endforeach

            @foreach($ebiofisicos as $ebiofisico)
            <tr>
                @if($ebiofisico == $ebiofisicos[0])
                <th rowspan="{{$nbiofisico}}" style="padding: 0;">BIOFISICO</th>
                @endif
                <td>
                    <a style="color:green" href="{{ url('/'.$project_id.'/table/'.$ebiofisico->id.'/form') }}">{{$ebiofisico->name_e}}</a>
                    <span style="font: 100% monospace;display: block;">{{$ebiofisico->characteristic->name_c}}</span>
                </td>
                <td>{{$ebiofisico->pressure}}</td>
                <td>{{$ebiofisico->state}}</td>
                <td>{{$ebiofisico->impact}}</td>
                <td>{{$ebiofisico->response}}</td>
            </tr>
            @endforeach



        </table>

        <a class="btn btn-danger" href="{{ url('/'.$project_id.'/diagram') }}" style="float: left;margin-left: 10px">Regresar</a>
        <a class="btn btn-success" href="{{ url('/'.$project_id.'/svg') }}" style="float: right;margin-right: 10px">SIGUIENTE</a>

    

</div>
@endsection