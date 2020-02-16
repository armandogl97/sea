@extends('layouts.app')

@section('content')
<a class="btn btn-success btn-round" style="color: white;position: absolute;margin-left:80%" href="{{ url('/create')}}">
    <i class="material-icons">add</i> Agregar Proyecto</a>
    <div class="container">


        <div class="row justify-content-center">
            <h3>Listado de Proyectos</h3>
            


            <table class="table">
                <thead>
                    <tr>
                        <th width="20%" style="padding: 0">Problema</th>
                        <th width="65%" style="padding: 0">Descripción</th>
                        <th class="text-right" style="padding: 0" width="15%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td style="padding: 0">{{$project->name_problem}}</td>
                        <td style="padding: 0">{{$project->desc_problem}}</td>
                        <td style="padding: 0" class="td-actions text-right">
                            <form id="formValidate" method="post" action="{{ url('/'.$project->id.'/delete') }}" style="margin: 0">
                                @csrf
                                <a href="{{ url('/'.$project->id.'/eview') }}" rel="tooltip" class="btn btn-success btn-round btn-sm" title="Ver / Editar">
                                    <i class="material-icons">create</i>
                                </a>
                                <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar" onclick="validaEnvio();">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
     </div>
 </div>
 <script type="text/javascript">

    function validaEnvio() {
if (!confirm('¿Deseas eliminar el Proyecto?')) {
    //$('#formValidate').submit();
    event.preventDefault();
}
}



</script>
 @endsection
