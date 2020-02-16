@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')
<?php
$alfabeto = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
  'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
  'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
  'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
  'AD','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ',
);
?>

<div class="wrapper">
  <form style="float: right;" method="post" action="{{ url('/'.$data->project_id.'/ba') }}" id="miFormulario">
    @csrf
    <button rel="tooltip" class="btn btn-danger btn-fab btn-round btn-sm" title="Eliminar">
      <i class="material-icons">delete</i>
    </button>
  </form>
  <h3 style="text-align: center;">ALTERNATIVAS</h3>
</div>
<div class="wrapper">
  <form method="post" action="{{ url('/rpt') }}" enctype="multipart/form-data" id="form">
    @csrf
    <input type="hidden" name="table" value="{{ $data->tabla }}" />
    <input type="hidden" name="rpt_id" value="{{ $data->id }}" />


    <table class="" style="width:95%; border:1px solid #C2C2C2;margin: 0 auto; ">
      <thead>
        <tr>
          <th rowspan="2" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"></th>
          <th colspan="{{ $data->politicas }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center">g1</th><!-- {{$enc[0]->n_group}}-->
          <th colspan="{{ $data->educacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center">g2</th>
          <th colspan="{{ $data->investigacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center">g3</th>
          <th colspan="{{ $data->planeacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center">g4</th>
          <th colspan="{{ $data->institucional }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center">g5</th>
          <th colspan="{{ $data->salud }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center">g6</th>
          <th colspan="{{ $data->legislacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center">g7</th>
          <th colspan="2" rowspan="2" style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2;" class="text-center">LÍNEAS DE ACCIÓN CON MAYOR ATENCIÓN POR PARTE DE LAS ALTERNATIVAS</th>
        </tr>
        <tr>
          <?php $totalRows = 2;

          if($data->politicas != 0) { $totalRows = $totalRows + $data->politicas; } else { $totalRows = $totalRows +1; }

          if($data->educacion != 0) { $totalRows = $totalRows + $data->educacion; } else { $totalRows = $totalRows +1; }

          if($data->investigacion != 0) { $totalRows = $totalRows + $data->investigacion; } else { $totalRows = $totalRows +1; }

          if($data->planeacion != 0) { $totalRows = $totalRows + $data->planeacion; } else { $totalRows = $totalRows +1; }

          if($data->institucional != 0) { $totalRows = $totalRows + $data->institucional; } else { $totalRows = $totalRows +1; }

          if($data->salud != 0) { $totalRows = $totalRows + $data->salud; } else { $totalRows = $totalRows +1; }

          if($data->legislacion != 0) { $totalRows = $totalRows + $data->legislacion; } else { $totalRows = $totalRows +1; }

          $divisionlinea=$data->politicas+$data->educacion+$data->investigacion+$data->planeacion+$data->institucional+$data->salud+$data->legislacion;

          ?>

          <?php $j=0; $k=0; ?>

          <?php if($data->politicas != 0) { ?>
            <?php for($i =0; $i < $data->politicas; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}"> <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } else { ?>
            <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
          <?php } ?>

          <?php if($data->educacion != 0) { ?>
            <?php for($i =0; $i < $data->educacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } else { ?>
            <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
          <?php } ?>

          <?php if($data->investigacion != 0) { ?>
            <?php for($i =0; $i < $data->investigacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } else { ?>
            <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
          <?php } ?>

          <?php if($data->planeacion != 0) { ?>
            <?php for($i =0; $i < $data->planeacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } else { ?>
            <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
          <?php } ?>

          <?php if($data->institucional != 0) { ?>
            <?php for($i =0; $i < $data->institucional; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) {
                  $k++; echo $alfabeto[0] . $alfabeto[$k];
                } else {
                  echo $alfabeto[$j]; $j++;
                } ; ?> </a>
              </th>
            <?php } ?>
          <?php } else { ?>
            <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
          <?php } ?>

          <?php if($data->salud != 0) { ?>
            <?php for($i =0; $i < $data->salud; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } else { ?>
            <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
          <?php } ?>

          <?php if($data->legislacion != 0) { ?>
            <?php for($i =0; $i < $data->legislacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } else { ?>
            <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
          <?php } ?>
          <input type="hidden" readonly name="total_lineas" value="<?php echo $totalRows-2; ?>" style="width:80%;" id="total_lineas"/>
        </tr>
      </thead>
      <tbody>
        <?php $rows = 0; ?>
        <?php foreach($dinamica as $key => $tabla) { ?>
          <!-- LINEA DEL GRUPO-->
          <tr>
            <td style="padding: 10px;width:15%; border-bottom: 1px solid #C2C2C2;" class="text-left"><b><?php echo strtoupper($key); ?></b></td>
            <td colspan="<?php echo $totalRows; ?>" style="padding: 0;  border-bottom: 1px solid #C2C2C2;" class="text-left"></td>
          </tr>
          <?php $pintados = 0; ?>
          <!-- LINEA DE LEYES-->
          <?php foreach($tabla as $childs) { ?>

            <tr id="row_<?php echo $childs->id;?>" class="">
              <td style="padding-top:0px; padding-left: 20px;; border-bottom: 1px solid #C2C2C2;  border-right: 1px solid #C2C2C2;" class="text-left">&nbsp; - &nbsp;<?php echo $childs->name_law; ?></td>

              <!-- CREAMOS LAS LINEAS HIJAS APARTIR DE LOS PARAMETROS HIJOS -->
              <?php if($data->politicas != 0) { ?>
                <?php for($i =0; $i < $data->politicas; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10;">
                    <select name="values[<?php echo $childs->id; ?>][politicas_<?php echo $i; ?>]" style="" class="variables_<?php echo $childs->id;?> politicas_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'politicas_{{ $i }}')">
                      <option value="0" <?php if($childs->{'politicas_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'politicas_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } else { ?>
                <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
              <?php } ?>

              <?php if($data->educacion != 0) { ?>
                <?php for($i =0; $i < $data->educacion; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2;  border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][educacion_<?php echo $i; ?>]" value="<?php echo $childs->{'educacion_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> educacion_<?php echo $i;?> cyel"  onchange="sumaUnos(<?php echo $childs->id;?>,'educacion_{{ $i }}')">
                      <option value="0" <?php if($childs->{'educacion_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'educacion_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } else { ?>
                <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
              <?php } ?>

              <?php if($data->investigacion != 0) { ?>
                <?php for($i =0; $i < $data->investigacion; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][investigacion_<?php echo $i; ?>]" value="<?php echo $childs->{'investigacion_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> investigacion_<?php echo $i;?> cyel"  onchange="sumaUnos(<?php echo $childs->id;?>,'investigacion_{{ $i }}')">
                      <option value="0" <?php if($childs->{'investigacion_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'investigacion_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } else { ?>
                <th style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </th>
              <?php } ?>

              <?php if($data->planeacion != 0) { ?>
                <?php for($i =0; $i < $data->planeacion; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; padding:10px; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][planeacion_<?php echo $i; ?>]" value="<?php echo $childs->{'planeacion_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> planeacion_<?php echo $i;?> cyel"  onchange="sumaUnos(<?php echo $childs->id;?>,'planeacion_{{ $i }}')">
                      <option value="0" <?php if($childs->{'planeacion_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'planeacion_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } else { ?>
                <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
              <?php } ?>

              <?php if($data->institucional != 0) { ?>
                <?php for($i =0; $i < $data->institucional; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select  name="values[<?php echo $childs->id; ?>][institucional_<?php echo $i; ?>]" value="<?php echo $childs->{'institucional_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> institucional_<?php echo $i;?> cyel"  onchange="sumaUnos(<?php echo $childs->id;?>,'institucional_{{ $i }}')">
                      <option value="0" <?php if($childs->{'institucional_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'institucional_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } else { ?>
                <td style="width:10%; padding: 0;border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
              <?php } ?>

              <?php if($data->salud != 0) { ?>
                <?php for($i =0; $i < $data->salud; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select  name="values[<?php echo $childs->id; ?>][salud_<?php echo $i; ?>]" value="<?php echo $childs->{'salud_' .$i};?>" style=""  class="variables_<?php echo $childs->id;?> salud_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'salud_{{ $i }}')">
                      <option value="0" <?php if($childs->{'salud_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'salud_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } else { ?>
                <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
              <?php } ?>

              <?php if($data->legislacion != 0) { ?>
                <?php for($i =0; $i < $data->legislacion; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][legislacion_<?php echo $i; ?>]" value="<?php echo $childs->{'legislacion_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> legislacion_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'legislacion_{{ $i }}')">
                      <option value="0" <?php if($childs->{'legislacion_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'legislacion_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } else { ?>
                <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
              <?php } ?>

              <td style="padding-top:0px; font-weight: bold;padding: 10; border-bottom: 1px solid #C2C2C2;  border-right: 1px solid #C2C2C2; <?php if(in_array($childs->porcentaje,$maximos) && $pintados <= 9) { echo 'background:#fccac7'; $pintados++;}?>" class="text-center">
                <div id="lblConteo_<?php echo $childs->id;?>"> <?php echo $childs->atencion;?> </div>
                <input type="hidden" name="values[<?php echo $childs->id; ?>][atencion]" value="<?php echo $childs->atencion;?>" style="width:80%;"  class="atenciones" id="atencion_<?php echo $childs->id;?>"/>
              </td>

              <td style="padding-top:0px;font-weight: bold; padding: 10; border-bottom: 1px solid #C2C2C2; <?php if(in_array($childs->porcentaje,$maximos) &&  $pintados <= 9) { echo 'background:#fccac7';  }?>" class="text-center">
                <div id="lblPorcentaje_<?php echo $childs->id;?>">
                  <?php echo round(($childs->atencion / ($totalRows -2)) *100,0);?> %
                </div>
                <input type="hidden" readonly name="values[<?php echo $childs->id; ?>][porcentaje]" value="<?php echo $childs->porcentaje;?>" style="width:80%;" class="porcentajes" id="porcentaje_<?php echo $childs->id;?>"/>
              </td>

            </tr>

            <?php $rows++; ?>

          <?php } ?>

        <?php } ?>
      </tbody>
      <tfoot>
        <tr>

          <?php $pintados = 0; ?>
          <td rowspan="2" style=" border-right: 1px solid #C2C2C2;" class="text-center"> <b> ALTERNATIVAS CON MAYOR IMPACTO EN LAS LÍNEAS DE ACCIÓN DESCRITAS</b> </td>

          <?php if($data->politicas != 0) { ?>
            <?php for($i =0; $i < $data->politicas; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['politicas_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="politicas_<?php echo $i;?>_sum"><?php echo $totales['politicas_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[politicas_<?php echo $i;?>][suma]" value="<?php echo $totales['politicas_' . $i]['suma']; ?>" style="width:80%;" id="politicas_<?php echo $i;?>_sum_txt"/>
              </th>

            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->educacion != 0) { ?>
            <?php for($i =0; $i < $data->educacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['educacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="educacion_<?php echo $i;?>_sum"><?php echo $totales['educacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[educacion_<?php echo $i;?>][suma]" value="<?php echo $totales['educacion_' . $i]['suma']; ?>" style="width:80%;" id="educacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->investigacion != 0) { ?>
            <?php for($i =0; $i < $data->investigacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['investigacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="investigacion_<?php echo $i;?>_sum"><?php echo $totales['investigacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[investigacion_<?php echo $i;?>][suma]" value="<?php echo $totales['investigacion_' . $i]['suma']; ?>" style="width:80%;" id="investigacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->planeacion != 0) { ?>
            <?php for($i =0; $i < $data->planeacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['planeacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="planeacion_<?php echo $i;?>_sum"><?php echo $totales['planeacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[planeacion_<?php echo $i;?>][suma]" value="<?php echo $totales['planeacion_' . $i]['suma']; ?>" style="width:80%;" id="planeacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->institucional != 0) { ?>
            <?php for($i =0; $i < $data->institucional; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['institucional_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="institucional_<?php echo $i;?>_sum"><?php echo $totales['institucional_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[institucional_<?php echo $i;?>][suma]" value="<?php echo $totales['institucional_' . $i]['suma']; ?>" style="width:80%;" id="institucional_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->salud != 0) { ?>
            <?php for($i =0; $i < $data->salud; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['salud_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="salud_<?php echo $i;?>_sum"><?php echo $totales['salud_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[salud_<?php echo $i;?>][suma]" value="<?php echo $totales['salud_' . $i]['suma']; ?>" style="width:80%;" id="salud_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->legislacion != 0) { ?>
            <?php for($i =0; $i < $data->legislacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['legislacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="legislacion_<?php echo $i;?>_sum"><?php echo $totales['legislacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[legislacion_<?php echo $i;?>][suma]" value="<?php echo $totales['legislacion_' . $i]['suma']; ?>" style="width:80%;" id="legislacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <td rowspan="2" colspan="2" style=" border-right: 1px solid #C2C2C2;" class="text-center"></td>

        </tr>
        <tr>
          <?php $pintados = 0; ?>
          <?php if($data->politicas != 0) { ?>
            <?php for($i =0; $i < $data->politicas; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['politicas_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="politicas_<?php echo $i;?>_porc"><?php echo $totales['politicas_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[politicas_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['politicas_' . $i]['porcentaje']; ?>" style="width:80%;" id="politicas_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->educacion != 0) { ?>
            <?php for($i =0; $i < $data->educacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['educacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="educacion_<?php echo $i;?>_porc"><?php echo $totales['educacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[educacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['educacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="educacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->investigacion != 0) { ?>
            <?php for($i =0; $i < $data->investigacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['investigacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="investigacion_<?php echo $i;?>_porc"><?php echo $totales['investigacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[investigacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['investigacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="investigacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->planeacion != 0) { ?>
            <?php for($i =0; $i < $data->planeacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['planeacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="planeacion_<?php echo $i;?>_porc"><?php echo $totales['planeacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[planeacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['planeacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="planeacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->institucional != 0) { ?>
            <?php for($i =0; $i < $data->institucional; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['institucional_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="institucional_<?php echo $i;?>_porc"><?php echo $totales['institucional_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[institucional_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['institucional_' . $i]['porcentaje']; ?>" style="width:80%;" id="institucional_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->salud != 0) { ?>
            <?php for($i =0; $i < $data->salud; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['salud_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++; } ?>" class="text-center">
                <div id="salud_<?php echo $i;?>_porc"><?php echo $totales['salud_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[salud_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['salud_' . $i]['porcentaje']; ?>" style="width:80%;" id="salud_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

          <?php if($data->legislacion != 0) { ?>
            <?php for($i =0; $i < $data->legislacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['legislacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="legislacion_<?php echo $i;?>_porc"><?php echo $totales['legislacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[legislacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['legislacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="legislacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } else { ?>
            <td style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"> &nbsp; </td>
          <?php } ?>

        </tr>
      </tfoot>
    </table>

    <br>
    <a class="btn btn-danger" href="{{ url('/'.$data->project_id.'/svg') }}" style="float: left;margin-left: 10px">Regresar</a>

    <buton class="btn btn-success" type="submit" style="float: right; margin-right: 10px" onclick="$('#form').submit()"> Guardar </buton>
  </form>

</div>

@endsection

@section('script')
<script>

  var media = <?php echo ($totalRows / 2); ?>;

  var total_lineas = parseInt(<?php echo (int)$rows; ?>);

  var total_columnas = parseInt(<?php echo (int)$divisionlinea; ?>);; //cambiar por numero de filas

  var i = 0;

  var j = 0;

  function sumaUnos(indice, columna){
  const x = document. getElementsByClassName("cyel");
    for (let e of x) {
      if (e.value==0) {
        e.style.backgroundColor = "white";
      }
      if (e.value==1) {
        e.style.backgroundColor = "#F4FF95";
      }
    }

    var unos       = 0;

    var unos_cols  = 0;

    /********* INICIAN SUMATORIAS DE  LINEAS *********/
    $('.variables_' + indice).each(function(){

      if($(this).val() == "1") {
        unos = unos +1;
      }

    });

    $('#atencion_' + indice).val(unos);
    $('#lblConteo_' + indice).html(unos);

    var porcentaje = (unos / total_columnas) * 100;

    $('#porcentaje_' + indice).val(porcentaje.toFixed(0));
    $('#lblPorcentaje_' + indice).html(porcentaje.toFixed(0) + ' %');

    /********* TERMINAN SUMATORIAS DE LINEAS *********/


    /********* INICIAN SUMATORIAS DE COLUMNAS *********/
    $('.' + columna).each(function(){

      if($(this).val() == "1") {
        unos_cols = unos_cols +1;
      }

    });

    var porc_cols = (unos_cols / total_lineas) * 100;

    $('#' + columna + '_sum').html(unos_cols);

    $('#' + columna + '_porc').html(porc_cols.toFixed(0) + ' %');

    $('#' + columna + '_porc_txt').val(porc_cols.toFixed(0));
    $('#' + columna + '_sum_txt').val(unos_cols.toFixed(0));
    /********* TERMINAN SUMATORIAS DE *********/

  }

  $( document ).ready(function() {
    sumaUnos(1,0);

  });

</script>
<script type="text/javascript">
  (function() {
    var form = document.getElementById('miFormulario');
    form.addEventListener('submit', function(event) {
            // si es false entonces que no haga el submit
            if (!confirm('¿Deseas eliminar la tabla de alternativas?')) {
              event.preventDefault();
            }
          }, false);
  })();
</script>

<script type="text/javascript">
  window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
  </script>


  <script type="text/javascript">
    
  </script>
  @endsection
