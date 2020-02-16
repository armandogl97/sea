@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <h3>Red de Análisis</h3>
    </div>

    <div class="row" style="color: black;margin-top: 30px">
        <div class="col-md-3" style="text-align: center">
            <form method="post" action="{{ url('/'.$project_id.'/svg') }}">
                @csrf
                <b>1- </b><span>Descarga la plantilla para hacer la Red de Análisis de tu proyecto haciendo clic. </span><button type="submit">Aquí</button>
            </form>
        </div>

        <div class="col-md-3" style="text-align: center">
            <b>2- </b><span>La plantilla es un archivo .XML que puedes abrir en cualquier editor de diagramas XML, recomendamos <a href="https://www.draw.io/" target="_blank">Draw.io</a></span>
        </div>

        <div class="col-md-3" style="text-align: center">
            <b>3- </b><span>Realiza la Red de Análisis del proyecto.</span>
        </div>

        <div class="col-md-3" style="text-align: center">
            <b>4- </b><span>Exporta tu Red de Análisis en Draw.io como un XML <b>sin comprimir.</b></span>
        </div>
    </div><br><br>
    @if($flag==0)
    <span style="font-size: 25px; font-weight: bold">Guarda tu Red de Análisis:</span>
    <form action="{{url('/'.$project_id.'/svgu')}}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <input type="file" name="file">
        <button type="submit">Guardar</button>
    </form>
    @endif

    @if($flag==1)
    <form action="#" enctype="multipart/form-data" method="post" style="display: inline;">
        {{ csrf_field() }}
        @foreach($networks as $network)
        <span style="font-size: 25px; font-weight: bold">Tu Red de Análisis:</span>
        <a class="btn btn-success" href="{{ url('/'.$project_id.'/uploads/'.$network->ruta)}}">Descargar</a>
        @endforeach
    </form>

    <form action="{{ url('/'.$project_id.'/svgd') }}" enctype="multipart/form-data" method="post" style="display: inline;" id="miFormulario">
        {{ csrf_field() }}
        <button type="submit"  class="btn btn-danger btn-fab btn-round btn-sm">
        <i class="material-icons">delete</i>
    </button>
    </form><br><br>

    <script type="text/javascript">
       (function() {
         var form = document.getElementById('miFormulario');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('¿Deseas eliminar tu red de Análisis?')) {
             event.preventDefault();
           }
         }, false);
       })();
     </script>

    @endif



</div>
<a class="btn btn-danger" href="{{ url('/'.$project_id.'/table') }}" style="float: left;margin-left: 10px">Regresar</a>

<a class="btn btn-success" href="{{ url('/'.$project_id.'/alternativas') }}" style="float: right;margin-right: 10px">SIGUIENTE</a>
@endsection
