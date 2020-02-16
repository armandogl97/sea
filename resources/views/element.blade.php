@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3>Elementos de {{$characteristic->name_c}} </h3>
    </div>
</div>

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
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">SOCIAL</td>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">ECONOMICO</td>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">CULTURAL</td>
            <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">POLITICO</td>
        </tr>
        <tr>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements') }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="ambit" value="SOCIAL" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name_e" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements') }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="ambit" value="ECONOMICO" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name_e" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements') }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="ambit" value="CULTURAL" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name_e" autofocus required>
                        <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                </form>
            </td>
            <td style="border-right:1px solid gray;">
                <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements') }}">@csrf   
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="ambit" value="POLITICO" >
                        <span class="input-group-text">Agregar:</span>
                        <input type="text" class="form-control" name="name_e" autofocus required>
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
                    @foreach ($elements_social as $element_social)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$element_social->name_e}}
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/'.$element_social->id.'/delete') }}">
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
                    @foreach ($elements_economico as $element_economico)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$element_economico->name_e}}
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/'.$element_economico->id.'/delete') }}">
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
                    @foreach ($elements_cultural as $element_cultural)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$element_cultural->name_e}}
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/'.$element_cultural->id.'/delete') }}">
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
                    @foreach ($elements_politico as $element_politico)
                    <tr>
                        <td style="width:80%;padding-left: 15px">
                            &#8226{{$element_politico->name_e}}
                        </td>
                        <td style="width: 20%;float: left;padding:0;">
                            <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/'.$element_politico->id.'/delete') }}">
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
    <hr>
    <div style="text-align:center; margin-bottom: 50px;">
        <table style="margin: 0 auto;width: 75%">
            <tr>
                <td style="text-align: center;font-weight: bold;border-right:1px solid gray;border-left: 1px solid gray">LEYES-INSTITUCIONAL</td>
                <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">SALUD</td>
                <td style="text-align: center;font-weight: bold;border-right:1px solid gray;">BIOFISICO</td>
            </tr>
            <tr>
                <td style="border-right:1px solid gray;border-left: 1px solid gray">
                    <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements') }}">@csrf   
                        <div class="input-group">
                            <input type="hidden" class="form-control" name="ambit" value="LEYES-INSTITUCIONAL" >
                            <span class="input-group-text">Agregar:</span>
                            <input type="text" class="form-control" name="name_e" autofocus required>
                            <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </form>
                </td>
                <td style="border-right:1px solid gray;">
                    <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements') }}">@csrf   
                        <div class="input-group">
                            <input type="hidden" class="form-control" name="ambit" value="SALUD" >
                            <span class="input-group-text">Agregar:</span>
                            <input type="text" class="form-control" name="name_e" autofocus required>
                            <button rel="tooltip" class="btn btn-success btn-fab btn-round btn-sm" title="Agregar">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </form>
                </td>
                <td style="border-right:1px solid gray;">
                    <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements') }}">@csrf   
                        <div class="input-group">
                            <input type="hidden" class="form-control" name="ambit" value="BIOFISICO" >
                            <span class="input-group-text">Agregar:</span>
                            <input type="text" class="form-control" name="name_e" autofocus required>
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
                        @foreach ($elements_leyes as $element_leyes)
                        <tr>
                            <td style="width:80%;padding-left: 15px">
                                &#8226{{$element_leyes->name_e}}
                            </td>
                            <td style="width: 20%;float: left;padding:0;">
                                <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/'.$element_leyes->id.'/delete') }}">
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
                        @foreach ($elements_salud as $element_salud)
                        <tr>
                            <td style="width:80%;padding-left: 15px">
                                &#8226{{$element_salud->name_e}}
                            </td>
                            <td style="width: 20%;float: left;padding:0;">
                                <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/'.$element_salud->id.'/delete') }}">
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
                        @foreach ($elements_biofisico as $element_biofisico)
                        <tr>
                            <td style="width:80%;padding-left: 15px">
                                &#8226{{$element_biofisico->name_e}}
                            </td>
                            <td style="width: 20%;float: left;padding:0;">
                                <form style="margin-bottom: 0" method="post" action="{{ url('/'.$project_id.'/characteristic/'.$characteristic_id.'/'.$element_biofisico->id.'/delete') }}">
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
    <a class="btn btn-success" href="{{ url('/'.$project_id.'/characteristic') }}" style="float: right;margin-right: 30px;">CONFIRMAR</a>

    


</div>
@endsection