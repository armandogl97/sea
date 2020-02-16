@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>Politicas - Planes - Programas </h3>
    </div>
    <div class="row justify-content-center" style="color: white">
        @php
            $internacional = 'internacional';
            $nacional = 'nacional';
            $estatal = 'estatal';
            $municipal = 'municipal';
        @endphp

        @if($inem =='internacional')
            <a href="{{ url('/ppp/'.$internacional) }}" class="button btn btn-success">internacional</a>
        @else
            <a href="{{ url('/ppp/'.$internacional) }}" class="button btn">Internacional</a>
        @endif
        @if($inem =='nacional')
            <a href="{{ url('/ppp/'.$nacional) }}" class="button btn btn-success">nacional</a>
        @else
            <a href="{{ url('/ppp/'.$nacional) }}" class="button btn">nacional</a>
        @endif
        @if($inem =='estatal')
            <a href="{{ url('/ppp/'.$estatal) }}" class="button btn btn-success">estatal</a>
        @else
            <a href="{{ url('/ppp/'.$estatal) }}" class="button btn">estatal</a>
        @endif
        @if($inem =='municipal')
            <a href="{{ url('/ppp/'.$municipal) }}" class="button btn btn-success">municipal</a>
        @else
            <a href="{{ url('/ppp/'.$municipal) }}" class="button btn">municipal</a>
        @endif
    </div><hr>

@if($inem =='internacional')
<div class="wrapperr">
    <style type="text/css">
        table{
            table-layout: fixed;
        }

        th, td {
            word-wrap: break-word;
            vertical-align: top;
        }
    </style>
    <table >
        <tr>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">POLITICAS INTERNACIONALES</td>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">PLANES INTERNACIONALES</td>
            <td style="text-align: center;font-weight: bold;">PROGRAMAS INTERNACIONALES</td>
        </tr>
        <tr>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="politica internacional" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="plan internacional" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="programa internacional" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        
        <tr>
            <td>
                <table style="width: 100%;">
                    @foreach ($politicas_internacionales as $politica_internacional)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$politica_internacional->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$politica_internacional->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($planes_internacionales as $plan_internacional)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$plan_internacional->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$plan_internacional->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach      
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($programas_internacionales as $programa_internacional)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$programa_internacional->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$programa_internacional->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach         
                </table>
            </td>
        </tr>
    </table>
</div>
@endif

@if($inem =='nacional')
<div class="wrapperr">
    <style type="text/css">
        table{
            table-layout: fixed;
        }

        th, td {
            word-wrap: break-word;
            vertical-align: top;
        }
    </style>
    <table >
        <tr>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">POLITICAS NACIONALES</td>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">PLANES NACIONALES</td>
            <td style="text-align: center;font-weight: bold;">PROGRAMAS NACIONALES</td>
        </tr>
        <tr>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="politica nacional" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="plan nacional" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="programa nacional" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        
        <tr>
            <td>
                <table style="width: 100%;">
                    @foreach ($politicas_nacionales as $politica_nacional)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$politica_nacional->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$politica_nacional->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($planes_nacionales as $plan_nacional)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$plan_nacional->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$plan_nacional->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach      
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($programas_nacionales as $programa_nacional)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$programa_nacional->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$programa_nacional->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach         
                </table>
            </td>
        </tr>
    </table>
</div>
@endif

@if($inem =='estatal')
<div class="wrapperr">
    <style type="text/css">
        table{
            table-layout: fixed;
        }

        th, td {
            word-wrap: break-word;
            vertical-align: top;
        }
    </style>
    <table >
        <tr>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">POLITICAS ESTATALES</td>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">PLANES ESTATALES</td>
            <td style="text-align: center;font-weight: bold;">PROGRAMAS ESTATALES</td>
        </tr>
        <tr>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="politica estatal" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="plan estatal" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="programa estatal" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        
        <tr>
            <td>
                <table style="width: 100%;">
                    @foreach ($politicas_estatales as $politica_estatal)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$politica_estatal->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$politica_estatal->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($planes_estatales as $plan_estatal)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$plan_estatal->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$plan_estatal->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach      
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($programas_estatales as $programa_estatal)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$programa_estatal->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$programa_estatal->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach         
                </table>
            </td>
        </tr>
    </table>
</div>
@endif


@if($inem =='municipal')
<div class="wrapperr">
    <style type="text/css">
        table{
            table-layout: fixed;
        }

        th, td {
            word-wrap: break-word;
            vertical-align: top;
        }
    </style>
    <table >
        <tr>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">POLITICAS MUNICIPALES</td>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">PLANES MUNICIPALES</td>
            <td style="text-align: center;font-weight: bold;">PROGRAMAS MUNICIPALES</td>
        </tr>
        <tr>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="politica municipal" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="plan municipal" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="">
                <form style="margin-bottom: 0" method="post" action="{{url('/ppp/'.$inem) }}">@csrf     
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="group" value="programa municipal" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        
        <tr>
            <td>
                <table style="width: 100%;">
                    @foreach ($politicas_municipales as $politica_municipal)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$politica_municipal->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$politica_municipal->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($planes_municipales as $plan_municipal)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$plan_municipal->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$plan_municipal->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach      
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($programas_municipales as $programa_municipal)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$programa_municipal->name_law}}
                            <hr>
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/ppp/'.$programa_municipal->id.'/delete') }}">
                                @csrf
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" style="margin: 1px">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach         
                </table>
            </td>
        </tr>
    </table>
</div>
@endif


</div>

@endsection