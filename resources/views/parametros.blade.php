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
      <input type="number" class="form-control" id="np" name="np" style="text-align: center;" onchange="muestra(this.value);" max="20">
    </div>
    <div class="row">
      <h3 id="g0" style="display: none;">Propuestas agrupadas:</h3>
    </div>
    <div class="row">

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g1">
        <label for="politicas" style="color: black;">Propuesta 1:</label>
        <input type="number" class="form-control limp" id="politicas" name="politicas" style="text-align: center;" min="1">
      </div>

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g2">
        <label for="educacion" style="color: black">Propuesta 2:</label>
        <input type="number" class="form-control limp" id="educacion" name="educacion" style="text-align: center;" min="1">
      </div>

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g3">
        <label for="investigacion" style="color: black">Propuesta 3:</label>
        <input type="number" class="form-control limp" id="investigacion" name="investigacion" style="text-align: center;" min="1">
      </div>

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g4">
        <label for="planeacion" style="color: black">Propuesta 4</label>
        <input type="number" class="form-control limp" id="planeacion" name="planeacion" style="text-align: center;" min="1">
      </div>

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g5">
        <label for="institucional" style="color: black">Propuesta 5:</label>
        <input type="number" class="form-control limp" id="institucional" name="institucional" style="text-align: center;" min="1">
      </div>

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g6">
        <label for="salud" style="color: black">Propuesta 6:</label>
        <input type="number" class="form-control limp" id="salud" name="salud" style="text-align: center;" min="1">
      </div>

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g7">
        <label for="legislacion" style="color: black">Propuesta 7:</label>
        <input type="number" class="form-control" id="legislacion" name="legislacion" style="text-align: center;" min="1">
      </div>

      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g8">
        <label for="p1" style="color: black">Propuesta 8:</label>
        <input type="number" class="form-control" id="p1" name="p1" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g9">
        <label for="p2" style="color: black">Propuesta 9:</label>
        <input type="number" class="form-control" id="p2" name="p2" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g10">
        <label for="p3" style="color: black">Propuesta 10:</label>
        <input type="number" class="form-control" id="p3" name="p3" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g11">
        <label for="p4" style="color: black">Propuesta 11:</label>
        <input type="number" class="form-control" id="p4" name="p4" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g12">
        <label for="p5" style="color: black">Propuesta 12:</label>
        <input type="number" class="form-control" id="p5" name="p5" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g13">
        <label for="p6" style="color: black">Propuesta 13:</label>
        <input type="number" class="form-control" id="p6" name="p6" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g14">
        <label for="p7" style="color: black">Propuesta 14:</label>
        <input type="number" class="form-control" id="p7" name="p7" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g15">
        <label for="p8" style="color: black">Propuesta 15:</label>
        <input type="number" class="form-control" id="p8" name="p8" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g16">
        <label for="p9" style="color: black">Propuesta 16:</label>
        <input type="number" class="form-control" id="p9" name="p9" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g17">
        <label for="p10" style="color: black">Propuesta 17:</label>
        <input type="number" class="form-control" id="p10" name="p10" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g18">
        <label for="p11" style="color: black">Propuesta 18:</label>
        <input type="number" class="form-control" id="p11" name="p11" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g19">
        <label for="p12" style="color: black">Propuesta 19:</label>
        <input type="number" class="form-control" id="p12" name="p12" style="text-align: center;" min="1">
      </div>
      <div class="form-group" style="width: 10%; display:inline-block;border-right: 1px solid gray;display: none;" id="g20">
        <label for="p13" style="color: black">Propuesta 20:</label>
        <input type="number" class="form-control" id="p13" name="p13" style="text-align: center;" min="1">
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
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'none';
      document.getElementById('gb').style.display = 'none';
      document.getElementById('politicas').value = "";
      document.getElementById('educacion').value = "";
      document.getElementById('investigacion').value = "";
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";

    }
    if (np.value==1) {
      document.getElementById('g1').style.display = 'inline';
      $('#politicas').prop('required', true);
      document.getElementById('g2').style.display = 'none';
      document.getElementById('g3').style.display = 'none';
      document.getElementById('g4').style.display = 'none';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('educacion').value = "";
      document.getElementById('investigacion').value = "";
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==2) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      document.getElementById('g3').style.display = 'none';
      document.getElementById('g4').style.display = 'none';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('investigacion').value = "";
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";

    }
    if (np.value==3) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      document.getElementById('g4').style.display = 'none';
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('planeacion').value = "";
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==4) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      document.getElementById('g5').style.display = 'none';
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('institucional').value = "";
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==5) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      document.getElementById('g6').style.display = 'none';
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('salud').value = "";
      document.getElementById('legislacion').value = "";
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==6) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      document.getElementById('g7').style.display = 'none';
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      document.getElementById('legislacion').value = "";
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==7) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'none';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      document.getElementById('p1').value = "";
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==8) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'none';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      document.getElementById('p2').value = "";
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==9) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'none';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      document.getElementById('p3').value = "";
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==10) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'none';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      document.getElementById('p4').value = "";
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==11) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'none';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      document.getElementById('p5').value = "";
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==12) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'none';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      document.getElementById('p6').value = "";
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==13) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'none';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      document.getElementById('p7').value = "";
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==14) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'inline';
      document.getElementById('g15').style.display = 'none';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      $('#p7').prop('required', true);
      document.getElementById('p8').value = "";
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==15) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'inline';
      document.getElementById('g15').style.display = 'inline';
      document.getElementById('g16').style.display = 'none';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      $('#p7').prop('required', true);
      $('#p8').prop('required', true);
      document.getElementById('p9').value = "";
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==16) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'inline';
      document.getElementById('g15').style.display = 'inline';
      document.getElementById('g16').style.display = 'inline';
      document.getElementById('g17').style.display = 'none';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      $('#p7').prop('required', true);
      $('#p8').prop('required', true);
      $('#p9').prop('required', true);
      document.getElementById('p10').value = "";
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==17) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'inline';
      document.getElementById('g15').style.display = 'inline';
      document.getElementById('g16').style.display = 'inline';
      document.getElementById('g17').style.display = 'inline';
      document.getElementById('g18').style.display = 'none';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      $('#p7').prop('required', true);
      $('#p8').prop('required', true);
      $('#p9').prop('required', true);
      $('#p10').prop('required', true);
      document.getElementById('p11').value = "";
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==18) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'inline';
      document.getElementById('g15').style.display = 'inline';
      document.getElementById('g16').style.display = 'inline';
      document.getElementById('g17').style.display = 'inline';
      document.getElementById('g18').style.display = 'inline';
      document.getElementById('g19').style.display = 'none';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      $('#p7').prop('required', true);
      $('#p8').prop('required', true);
      $('#p9').prop('required', true);
      $('#p10').prop('required', true);
      $('#p11').prop('required', true);
      document.getElementById('p12').value = "";
      document.getElementById('p13').value = "";
    }
    if (np.value==19) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'inline';
      document.getElementById('g15').style.display = 'inline';
      document.getElementById('g16').style.display = 'inline';
      document.getElementById('g17').style.display = 'inline';
      document.getElementById('g18').style.display = 'inline';
      document.getElementById('g19').style.display = 'inline';
      document.getElementById('g20').style.display = 'none';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      $('#p7').prop('required', true);
      $('#p8').prop('required', true);
      $('#p9').prop('required', true);
      $('#p10').prop('required', true);
      $('#p11').prop('required', true);
      $('#p12').prop('required', true);
      document.getElementById('p13').value = "";
    }
    if (np.value==20) {
      document.getElementById('g1').style.display = 'inline';
      document.getElementById('g2').style.display = 'inline';
      document.getElementById('g3').style.display = 'inline';
      document.getElementById('g4').style.display = 'inline';
      document.getElementById('g5').style.display = 'inline';
      document.getElementById('g6').style.display = 'inline';
      document.getElementById('g7').style.display = 'inline';
      document.getElementById('g8').style.display = 'inline';
      document.getElementById('g9').style.display = 'inline';
      document.getElementById('g10').style.display = 'inline';
      document.getElementById('g11').style.display = 'inline';
      document.getElementById('g12').style.display = 'inline';
      document.getElementById('g13').style.display = 'inline';
      document.getElementById('g14').style.display = 'inline';
      document.getElementById('g15').style.display = 'inline';
      document.getElementById('g16').style.display = 'inline';
      document.getElementById('g17').style.display = 'inline';
      document.getElementById('g18').style.display = 'inline';
      document.getElementById('g19').style.display = 'inline';
      document.getElementById('g20').style.display = 'inline';
      document.getElementById('g0').style.display = 'inline';
      document.getElementById('gb').style.display = 'inline';
      $('#politicas').prop('required', true);
      $('#educacion').prop('required', true);
      $('#investigacion').prop('required', true);
      $('#planeacion').prop('required', true);
      $('#institucional').prop('required', true);
      $('#salud').prop('required', true);
      $('#legislacion').prop('required', true);
      $('#p1').prop('required', true);
      $('#p2').prop('required', true);
      $('#p3').prop('required', true);
      $('#p4').prop('required', true);
      $('#p5').prop('required', true);
      $('#p6').prop('required', true);
      $('#p7').prop('required', true);
      $('#p8').prop('required', true);
      $('#p9').prop('required', true);
      $('#p10').prop('required', true);
      $('#p11').prop('required', true);
      $('#p12').prop('required', true);
      $('#p13').prop('required', true);
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
    }else{return true;}
  }
</script
@endsection
