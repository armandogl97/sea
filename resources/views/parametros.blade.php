@extends('layouts.app')

@section('content')
<div class="container">
  <form method="get" action="{{ url('/reporte') }}" id="formValidate" onsubmit="return validaEnvio();">
    <input type="hidden" name="project_id" id="project_id" value="{{ $proyecto->id }}" />
    <div class="row justify-content-center">
      <h3>Selecciona las Políticas, Programas y Planes</h3>
    </div>
    <div class="row">
      <?php foreach($parametros as $key => $values) { ?>
        <div class="col-md-3">
          <h3> {{ strtoupper($key) }}</h3>
          <?php foreach($values as $childs) { ?>
            <p>
              <label>
                <input type="checkbox" class="checkeds" name="laws_id[]" id="law_id{{ $childs['id'] }}" value="{{ $childs['id'] }}" />
                {{ $childs['nombre'] }}
              </label>
            </p>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
    <hr/>

    <div class="row">
      <h3>Numero de propuestas:</h3>
      <input type="number" class="form-control" id="np" name="np" style="text-align: center;" onchange="muestra(this.value);">
    </div>
    <div class="row">
      <h3 id="g0" style="display: none;">Propuestas agrupadas:</h3>
    </div>
    <div class="row">

      <div class="form-group" style="width: 13%; display:inline-block;border-right: 1px solid gray;display: none;" id="g1">
        <label for="politicas" style="color: black;">Propuesta 1:</label>
        <input type="number" class="form-control limp" id="politicas" name="politicas" style="text-align: center;" required min="1">
      </div>

      <div class="form-group" style="width: 17%; display:inline-block;border-right: 1px solid gray;display: none;" id="g2">
        <label for="educacion" style="color: black">Propuesta 2:</label>
        <input type="number" class="form-control limp" id="educacion" name="educacion" style="text-align: center;" required min="1">
      </div>

      <div class="form-group" style="width: 13%; display:inline-block;border-right: 1px solid gray;display: none;" id="g3">
        <label for="investigacion" style="color: black">Propuesta 3:</label>
        <input type="number" class="form-control limp" id="investigacion" name="investigacion" style="text-align: center;" required min="1">
      </div>

      <div class="form-group" style="width: 13%; display:inline-block;border-right: 1px solid gray;display: none;" id="g4">
        <label for="planeacion" style="color: black">Propuesta 4</label>
        <input type="number" class="form-control limp" id="planeacion" name="planeacion" style="text-align: center;" required min="1">
      </div>

      <div class="form-group" style="width: 13%; display:inline-block;border-right: 1px solid gray;display: none;" id="g5">
        <label for="institucional" style="color: black">Propuesta 5:</label>
        <input type="number" class="form-control limp" id="institucional" name="institucional" style="text-align: center;" required min="1">
      </div>

      <div class="form-group" style="width: 13%; display:inline-block;border-right: 1px solid gray;display: none;" id="g6">
        <label for="salud" style="color: black">Propuesta 6:</label>
        <input type="number" class="form-control limp" id="salud" name="salud" style="text-align: center;" required min="1">
      </div>

      <div class="form-group" style="width: 13%; display:inline-block;border-right: 1px solid gray;display: none;" id="g7">
        <label for="legislacion" style="color: black">Propuesta 7:</label>
        <input type="number" class="form-control" id="legislacion" name="legislacion" style="text-align: center;" required min="1">
      </div>
    </div>
    <div class="row justify-content-center">
      <button id="gb" style="display: none;" class="btn btn-success btn-round" type="submit" >
     <i class="material-icons">add</i> CREAR TABLA DE ALTERNATIVAS</button>
    </div>
    
 </form>
</div>

<a class="btn btn-danger" href="{{ url('/'.$proyecto->id.'/svg') }}" style="float: left;margin-left: 10px">Cancelar</a>

<script>
  function muestra() {
    if (np.value==0) {
      document.getElementById('g1').style.display = 'none';
      document.getElementById('g2').style.display = 'none';
      document.getElementById('g3').style.display = 'none';
      document.getElementById('g4').style.display = 'none';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g0').style.display = 'none';
      document.getElementById('gb').style.display = 'none';
      document.getElementById('politicas').value = "";
      document.getElementById('educacion').value = "";
      document.getElementById('investigacion').value = "";
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";

    }
    if (np.value==1) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'none';
      document.getElementById('g3').style.display = 'none';
      document.getElementById('g4').style.display = 'none';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('educacion').value = "";
      document.getElementById('investigacion').value = "";
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
    }
    if (np.value==2) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'none';
      document.getElementById('g4').style.display = 'none';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('investigacion').value = "";
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";

    }
    if (np.value==3) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'none';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
    }
    if (np.value==4) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
    }
    if (np.value==5) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
    }
    if (np.value==6) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('legislacion').value = "";
    }
    if (np.value==7) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
    }
  }
</script>
<script>

  var checkeados = 0;

  var requeridos = 0;

  function validaEnvio() {

    $('.checkeds').each(function(){

      if($(this).is(':checked')) {
        checkeados ++;
      } else {

      }

    });

    if(checkeados == 0) {
      alert('Seleccione mínimo un programa, plan o política.');
      return false;
    }
    $('#formValidate').submit();
  }

</script>
@endsection
