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

  <form style="display: hidden" method="post" action="{{ url('/cambiot') }}" id="cambiot">
    @csrf
    <input type="hidden" name="encabezado" id="encabezado" />
    <input type="hidden" name="propuesta" id="propuesta" />
    <input type="hidden" name="rpt_id" value="{{ $data->id }}" />
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
          @if($data->politicas >= 1)
          <th colspan="{{ $data->politicas }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(1);">{{$enc[0]->n_group}}</a></th>
          @endif
          @if($data->educacion >= 1)
          <th colspan="{{ $data->educacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(2);">{{$enc[1]->n_group}}</a></th>
          @endif
          @if($data->investigacion >= 1)
          <th colspan="{{ $data->investigacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(3);">{{$enc[2]->n_group}}</a></th>
          @endif
          @if($data->planeacion >= 1)
          <th colspan="{{ $data->planeacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(4);">{{$enc[3]->n_group}}</a></th>
          @endif
          @if($data->institucional >= 1)
          <th colspan="{{ $data->institucional }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(5);">{{$enc[4]->n_group}}</a></th>
          @endif
          @if($data->salud >= 1)
          <th colspan="{{ $data->salud }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(6);">{{$enc[5]->n_group}}</a></th>
          @endif
          @if($data->legislacion >= 1)
          <th colspan="{{ $data->legislacion }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(7);">{{$enc[6]->n_group}}</a></th>
          @endif
          @if($data->p1 >= 1)
          <th colspan="{{ $data->p1 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(8);">{{$enc[7]->n_group}}</a></th>
          @endif
          @if($data->p2 >= 1)
          <th colspan="{{ $data->p2 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(9);">{{$enc[8]->n_group}}</a></th>
          @endif
          @if($data->p3 >= 1)
          <th colspan="{{ $data->p3 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(10);">{{$enc[9]->n_group}}</a></th>
          @endif
          @if($data->p4 >= 1)
          <th colspan="{{ $data->p4 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(11);">{{$enc[10]->n_group}}</a></th>
          @endif
          @if($data->p5 >= 1)
          <th colspan="{{ $data->p5 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(12);">{{$enc[11]->n_group}}</a></th>
          @endif
          @if($data->p6 >= 1)
          <th colspan="{{ $data->p6 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(13);">{{$enc[12]->n_group}}</a></th>
          @endif
          @if($data->p7 >= 1)
          <th colspan="{{ $data->p7 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(14);">{{$enc[13]->n_group}}</a></th>
          @endif
          @if($data->p8 >= 1)
          <th colspan="{{ $data->p8 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(15);">{{$enc[14]->n_group}}</a></th>
          @endif
          @if($data->p9 >= 1)
          <th colspan="{{ $data->p9 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(16);">{{$enc[15]->n_group}}</a></th>
          @endif
          @if($data->p10 >= 1)
          <th colspan="{{ $data->p10 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(17);">{{$enc[16]->n_group}}</a></th>
          @endif
          @if($data->p11 >= 1)
          <th colspan="{{ $data->p11 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(18);">{{$enc[17]->n_group}}</a></th>
          @endif
          @if($data->p12 >= 1)
          <th colspan="{{ $data->p12 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(19);">{{$enc[18]->n_group}}</a></th>
          @endif
          @if($data->p13 >= 1)
          <th colspan="{{ $data->p13 }}" style="padding: 0; border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;" class="text-center"><a href="#" style="color: #3C4858" onclick="ct(20);">{{$enc[19]->n_group}}</a></th>
          @endif

          <th colspan="2" rowspan="2" style="width:10%; padding: 0; border-bottom: 1px solid #C2C2C2;" class="text-center">LÍNEAS DE ACCIÓN CON MAYOR ATENCIÓN POR PARTE DE LAS ALTERNATIVAS</th>
        </tr>
        <tr>
          <?php $totalRows = 2;

          if($data->politicas != 0) { $totalRows = $totalRows + $data->politicas; } else { $totalRows = $totalRows +0; }

          if($data->educacion != 0) { $totalRows = $totalRows + $data->educacion; } else { $totalRows = $totalRows +0; }

          if($data->investigacion != 0) { $totalRows = $totalRows + $data->investigacion; } else { $totalRows = $totalRows +0; }

          if($data->planeacion != 0) { $totalRows = $totalRows + $data->planeacion; } else { $totalRows = $totalRows +0; }

          if($data->institucional != 0) { $totalRows = $totalRows + $data->institucional; } else { $totalRows = $totalRows +0; }

          if($data->salud != 0) { $totalRows = $totalRows + $data->salud; } else { $totalRows = $totalRows +0; }

          if($data->legislacion != 0) { $totalRows = $totalRows + $data->legislacion; } else { $totalRows = $totalRows +0; }
          if($data->p1 != 0) { $totalRows = $totalRows + $data->p1; } else { $totalRows = $totalRows +0; }
          if($data->p2 != 0) { $totalRows = $totalRows + $data->p2; } else { $totalRows = $totalRows +0; }
          if($data->p3 != 0) { $totalRows = $totalRows + $data->p3; } else { $totalRows = $totalRows +0; } 
          if($data->p4 != 0) { $totalRows = $totalRows + $data->p4; } else { $totalRows = $totalRows +0; }
          if($data->p5 != 0) { $totalRows = $totalRows + $data->p5; } else { $totalRows = $totalRows +0; } 
          if($data->p6 != 0) { $totalRows = $totalRows + $data->p6; } else { $totalRows = $totalRows +0; }  
          if($data->p7 != 0) { $totalRows = $totalRows + $data->p7; } else { $totalRows = $totalRows +0; }
          if($data->p8 != 0) { $totalRows = $totalRows + $data->p8; } else { $totalRows = $totalRows +0; }
          if($data->p9 != 0) { $totalRows = $totalRows + $data->p9; } else { $totalRows = $totalRows +0; }
          if($data->p10 != 0) { $totalRows = $totalRows + $data->p10; } else { $totalRows = $totalRows +0; }
          if($data->p11 != 0) { $totalRows = $totalRows + $data->p11; } else { $totalRows = $totalRows +0; }
          if($data->p12 != 0) { $totalRows = $totalRows + $data->p12; } else { $totalRows = $totalRows +0; }
          if($data->p13 != 0) { $totalRows = $totalRows + $data->p13; } else { $totalRows = $totalRows +0; }

          $divisionlinea=$data->politicas+$data->educacion+$data->investigacion+$data->planeacion+$data->institucional+$data->salud+$data->legislacion+$data->p1+$data->p2+$data->p3+$data->p4+$data->p5+$data->p6+$data->p7+$data->p8+$data->p9+$data->p10+$data->p11+$data->p12+$data->p13;

          ?>

          <?php $j=0; $k=0; ?>

          <?php if($data->politicas != 0) { ?>
            <?php for($i =0; $i < $data->politicas; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}"> <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->educacion != 0) { ?>
            <?php for($i =0; $i < $data->educacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->investigacion != 0) { ?>
            <?php for($i =0; $i < $data->investigacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->planeacion != 0) { ?>
            <?php for($i =0; $i < $data->planeacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
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
          <?php } ?>

          <?php if($data->salud != 0) { ?>
            <?php for($i =0; $i < $data->salud; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->legislacion != 0) { ?>
            <?php for($i =0; $i < $data->legislacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p1 != 0) { ?>
            <?php for($i =0; $i < $data->p1; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p2 != 0) { ?>
            <?php for($i =0; $i < $data->p2; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p3 != 0) { ?>
            <?php for($i =0; $i < $data->p3; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p4 != 0) { ?>
            <?php for($i =0; $i < $data->p4; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p5 != 0) { ?>
            <?php for($i =0; $i < $data->p5; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p6 != 0) { ?>
            <?php for($i =0; $i < $data->p6; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p7 != 0) { ?>
            <?php for($i =0; $i < $data->p7; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p8 != 0) { ?>
            <?php for($i =0; $i < $data->p8; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p9 != 0) { ?>
            <?php for($i =0; $i < $data->p9; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p10 != 0) { ?>
            <?php for($i =0; $i < $data->p10; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p11 != 0) { ?>
            <?php for($i =0; $i < $data->p11; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p12 != 0) { ?>
            <?php for($i =0; $i < $data->p12; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p13 != 0) { ?>
            <?php for($i =0; $i < $data->p13; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2;" class="text-center">
                <a style="color: #3C4858" href="{{url('/rpt/'.$data->id).'/'. $alfabeto[$j]}}">
                <?php if($j >= count($alfabeto)) { $k++; echo $alfabeto[0] . $alfabeto[$k]; } else { echo $alfabeto[$j]; $j++; } ; ?> </a>
              </th>
            <?php } ?>
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
              <?php } ?>

              <?php if($data->p1 != 0) { ?>
                <?php for($i =0; $i < $data->p1; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p1_<?php echo $i; ?>]" value="<?php echo $childs->{'p1_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p1_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p1_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p1_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p1_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p2 != 0) { ?>
                <?php for($i =0; $i < $data->p2; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p2_<?php echo $i; ?>]" value="<?php echo $childs->{'p2_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p2_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p2_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p2_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p2_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p3 != 0) { ?>
                <?php for($i =0; $i < $data->p3; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p3_<?php echo $i; ?>]" value="<?php echo $childs->{'p3_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p3_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p3_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p3_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p3_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p4 != 0) { ?>
                <?php for($i =0; $i < $data->p4; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p4_<?php echo $i; ?>]" value="<?php echo $childs->{'p4_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p4_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p4_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p4_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p4_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p5 != 0) { ?>
                <?php for($i =0; $i < $data->p5; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p5_<?php echo $i; ?>]" value="<?php echo $childs->{'p5_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p5_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p5_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p5_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p5_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p6 != 0) { ?>
                <?php for($i =0; $i < $data->p6; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p6_<?php echo $i; ?>]" value="<?php echo $childs->{'p6_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p6_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p6_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p6_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p6_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p7 != 0) { ?>
                <?php for($i =0; $i < $data->p7; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p7_<?php echo $i; ?>]" value="<?php echo $childs->{'p7_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p7_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p7_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p7_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p7_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p8 != 0) { ?>
                <?php for($i =0; $i < $data->p8; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p8_<?php echo $i; ?>]" value="<?php echo $childs->{'p8_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p8_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p8_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p8_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p8_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p9 != 0) { ?>
                <?php for($i =0; $i < $data->p9; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p9_<?php echo $i; ?>]" value="<?php echo $childs->{'p9_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p9_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p9_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p9_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p9_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p10 != 0) { ?>
                <?php for($i =0; $i < $data->p10; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p10_<?php echo $i; ?>]" value="<?php echo $childs->{'p10_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p10_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p10_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p10_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p10_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p11 != 0) { ?>
                <?php for($i =0; $i < $data->p11; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p11_<?php echo $i; ?>]" value="<?php echo $childs->{'p11_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p11_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p11_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p11_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p11_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p12 != 0) { ?>
                <?php for($i =0; $i < $data->p12; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p12_<?php echo $i; ?>]" value="<?php echo $childs->{'p12_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p12_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p12_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p12_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p12_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
              <?php } ?>
              <?php if($data->p13 != 0) { ?>
                <?php for($i =0; $i < $data->p13; $i++) { ?>
                  <td class="text-center" style="border-bottom: 1px solid #C2C2C2; border-right: 1px solid #C2C2C2;padding: 10">
                    <select name="values[<?php echo $childs->id; ?>][p13_<?php echo $i; ?>]" value="<?php echo $childs->{'p13_' .$i};?>" style="" class="variables_<?php echo $childs->id;?> p13_<?php echo $i;?> cyel" onchange="sumaUnos(<?php echo $childs->id;?>,'p13_{{ $i }}')">
                      <option value="0" <?php if($childs->{'p13_' .$i} == "0") { echo 'selected'; } ?>>0</option>
                      <option value="1" <?php if($childs->{'p13_' .$i} == "1") { echo 'selected'; } ?>>1</option>
                    </select>
                  </td>
                <?php } ?>
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
          <?php } ?>

          <?php if($data->educacion != 0) { ?>
            <?php for($i =0; $i < $data->educacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['educacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="educacion_<?php echo $i;?>_sum"><?php echo $totales['educacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[educacion_<?php echo $i;?>][suma]" value="<?php echo $totales['educacion_' . $i]['suma']; ?>" style="width:80%;" id="educacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->investigacion != 0) { ?>
            <?php for($i =0; $i < $data->investigacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['investigacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="investigacion_<?php echo $i;?>_sum"><?php echo $totales['investigacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[investigacion_<?php echo $i;?>][suma]" value="<?php echo $totales['investigacion_' . $i]['suma']; ?>" style="width:80%;" id="investigacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->planeacion != 0) { ?>
            <?php for($i =0; $i < $data->planeacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['planeacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="planeacion_<?php echo $i;?>_sum"><?php echo $totales['planeacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[planeacion_<?php echo $i;?>][suma]" value="<?php echo $totales['planeacion_' . $i]['suma']; ?>" style="width:80%;" id="planeacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->institucional != 0) { ?>
            <?php for($i =0; $i < $data->institucional; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['institucional_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="institucional_<?php echo $i;?>_sum"><?php echo $totales['institucional_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[institucional_<?php echo $i;?>][suma]" value="<?php echo $totales['institucional_' . $i]['suma']; ?>" style="width:80%;" id="institucional_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->salud != 0) { ?>
            <?php for($i =0; $i < $data->salud; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['salud_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="salud_<?php echo $i;?>_sum"><?php echo $totales['salud_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[salud_<?php echo $i;?>][suma]" value="<?php echo $totales['salud_' . $i]['suma']; ?>" style="width:80%;" id="salud_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->legislacion != 0) { ?>
            <?php for($i =0; $i < $data->legislacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['legislacion_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="legislacion_<?php echo $i;?>_sum"><?php echo $totales['legislacion_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[legislacion_<?php echo $i;?>][suma]" value="<?php echo $totales['legislacion_' . $i]['suma']; ?>" style="width:80%;" id="legislacion_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->p1 != 0) { ?>
            <?php for($i =0; $i < $data->p1; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p1_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p1_<?php echo $i;?>_sum"><?php echo $totales['p1_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p1_<?php echo $i;?>][suma]" value="<?php echo $totales['p1_' . $i]['suma']; ?>" style="width:80%;" id="p1_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p2 != 0) { ?>
            <?php for($i =0; $i < $data->p2; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p2_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p2_<?php echo $i;?>_sum"><?php echo $totales['p2_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p2_<?php echo $i;?>][suma]" value="<?php echo $totales['p2_' . $i]['suma']; ?>" style="width:80%;" id="p2_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p3 != 0) { ?>
            <?php for($i =0; $i < $data->p3; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p3_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p3_<?php echo $i;?>_sum"><?php echo $totales['p3_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p3_<?php echo $i;?>][suma]" value="<?php echo $totales['p3_' . $i]['suma']; ?>" style="width:80%;" id="p3_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p4 != 0) { ?>
            <?php for($i =0; $i < $data->p4; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p4_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p4_<?php echo $i;?>_sum"><?php echo $totales['p4_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p4_<?php echo $i;?>][suma]" value="<?php echo $totales['p4_' . $i]['suma']; ?>" style="width:80%;" id="p4_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p5 != 0) { ?>
            <?php for($i =0; $i < $data->p5; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p5_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p5_<?php echo $i;?>_sum"><?php echo $totales['p5_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p5_<?php echo $i;?>][suma]" value="<?php echo $totales['p5_' . $i]['suma']; ?>" style="width:80%;" id="p5_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p6 != 0) { ?>
            <?php for($i =0; $i < $data->p6; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p6_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p6_<?php echo $i;?>_sum"><?php echo $totales['p6_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p6_<?php echo $i;?>][suma]" value="<?php echo $totales['p6_' . $i]['suma']; ?>" style="width:80%;" id="p6_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p7 != 0) { ?>
            <?php for($i =0; $i < $data->p7; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p7_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p7_<?php echo $i;?>_sum"><?php echo $totales['p7_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p7_<?php echo $i;?>][suma]" value="<?php echo $totales['p7_' . $i]['suma']; ?>" style="width:80%;" id="p7_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p8 != 0) { ?>
            <?php for($i =0; $i < $data->p8; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p8_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p8_<?php echo $i;?>_sum"><?php echo $totales['p8_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p8_<?php echo $i;?>][suma]" value="<?php echo $totales['p8_' . $i]['suma']; ?>" style="width:80%;" id="p8_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p9 != 0) { ?>
            <?php for($i =0; $i < $data->p9; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p9_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p9_<?php echo $i;?>_sum"><?php echo $totales['p9_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p9_<?php echo $i;?>][suma]" value="<?php echo $totales['p9_' . $i]['suma']; ?>" style="width:80%;" id="p9_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p10 != 0) { ?>
            <?php for($i =0; $i < $data->p10; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p10_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p10_<?php echo $i;?>_sum"><?php echo $totales['p10_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p10_<?php echo $i;?>][suma]" value="<?php echo $totales['p10_' . $i]['suma']; ?>" style="width:80%;" id="p10_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p11 != 0) { ?>
            <?php for($i =0; $i < $data->p11; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p11_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p11_<?php echo $i;?>_sum"><?php echo $totales['p11_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p11_<?php echo $i;?>][suma]" value="<?php echo $totales['p11_' . $i]['suma']; ?>" style="width:80%;" id="p11_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p12 != 0) { ?>
            <?php for($i =0; $i < $data->p12; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p12_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p12_<?php echo $i;?>_sum"><?php echo $totales['p12_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p12_<?php echo $i;?>][suma]" value="<?php echo $totales['p12_' . $i]['suma']; ?>" style="width:80%;" id="p12_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p13 != 0) { ?>
            <?php for($i =0; $i < $data->p13; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p13_' . $i]['suma'],$tMaximos[0]) &&  $pintados <= 9) { echo 'background: #fccac7; ';  $pintados++;} ?>" class="text-center">
                <div id="p13_<?php echo $i;?>_sum"><?php echo $totales['p13_' . $i]['suma']; ?></div>
                <input type="hidden" readonly name="totales[p13_<?php echo $i;?>][suma]" value="<?php echo $totales['p13_' . $i]['suma']; ?>" style="width:80%;" id="p13_<?php echo $i;?>_sum_txt"/>
              </th>
            <?php } ?>
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
          <?php } ?>

          <?php if($data->educacion != 0) { ?>
            <?php for($i =0; $i < $data->educacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['educacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="educacion_<?php echo $i;?>_porc"><?php echo $totales['educacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[educacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['educacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="educacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->investigacion != 0) { ?>
            <?php for($i =0; $i < $data->investigacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['investigacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="investigacion_<?php echo $i;?>_porc"><?php echo $totales['investigacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[investigacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['investigacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="investigacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->planeacion != 0) { ?>
            <?php for($i =0; $i < $data->planeacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['planeacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="planeacion_<?php echo $i;?>_porc"><?php echo $totales['planeacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[planeacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['planeacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="planeacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->institucional != 0) { ?>
            <?php for($i =0; $i < $data->institucional; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['institucional_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7';  $pintados++;} ?>" class="text-center">
                <div id="institucional_<?php echo $i;?>_porc"><?php echo $totales['institucional_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[institucional_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['institucional_' . $i]['porcentaje']; ?>" style="width:80%;" id="institucional_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->salud != 0) { ?>
            <?php for($i =0; $i < $data->salud; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['salud_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++; } ?>" class="text-center">
                <div id="salud_<?php echo $i;?>_porc"><?php echo $totales['salud_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[salud_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['salud_' . $i]['porcentaje']; ?>" style="width:80%;" id="salud_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->legislacion != 0) { ?>
            <?php for($i =0; $i < $data->legislacion; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['legislacion_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="legislacion_<?php echo $i;?>_porc"><?php echo $totales['legislacion_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[legislacion_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['legislacion_' . $i]['porcentaje']; ?>" style="width:80%;" id="legislacion_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>

          <?php if($data->p1 != 0) { ?>
            <?php for($i =0; $i < $data->p1; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p1_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p1_<?php echo $i;?>_porc"><?php echo $totales['p1_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p1_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p1_' . $i]['porcentaje']; ?>" style="width:80%;" id="p1_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p2 != 0) { ?>
            <?php for($i =0; $i < $data->p2; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p2_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p2_<?php echo $i;?>_porc"><?php echo $totales['p2_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p2_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p2_' . $i]['porcentaje']; ?>" style="width:80%;" id="p2_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p3 != 0) { ?>
            <?php for($i =0; $i < $data->p3; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p3_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p3_<?php echo $i;?>_porc"><?php echo $totales['p3_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p3_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p3_' . $i]['porcentaje']; ?>" style="width:80%;" id="p3_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p4 != 0) { ?>
            <?php for($i =0; $i < $data->p4; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p4_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p4_<?php echo $i;?>_porc"><?php echo $totales['p4_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p4_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p4_' . $i]['porcentaje']; ?>" style="width:80%;" id="p4_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p5 != 0) { ?>
            <?php for($i =0; $i < $data->p5; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p5_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p5_<?php echo $i;?>_porc"><?php echo $totales['p5_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p5_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p5_' . $i]['porcentaje']; ?>" style="width:80%;" id="p5_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p6 != 0) { ?>
            <?php for($i =0; $i < $data->p6; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p6_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p6_<?php echo $i;?>_porc"><?php echo $totales['p6_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p6_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p6_' . $i]['porcentaje']; ?>" style="width:80%;" id="p6_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p7 != 0) { ?>
            <?php for($i =0; $i < $data->p7; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p7_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p7_<?php echo $i;?>_porc"><?php echo $totales['p7_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p7_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p7_' . $i]['porcentaje']; ?>" style="width:80%;" id="p7_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p8 != 0) { ?>
            <?php for($i =0; $i < $data->p8; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p8_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p8_<?php echo $i;?>_porc"><?php echo $totales['p8_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p8_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p8_' . $i]['porcentaje']; ?>" style="width:80%;" id="p8_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p9 != 0) { ?>
            <?php for($i =0; $i < $data->p9; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p9_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p9_<?php echo $i;?>_porc"><?php echo $totales['p9_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p9_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p9_' . $i]['porcentaje']; ?>" style="width:80%;" id="p9_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p10 != 0) { ?>
            <?php for($i =0; $i < $data->p10; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p10_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p10_<?php echo $i;?>_porc"><?php echo $totales['p10_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p10_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p10_' . $i]['porcentaje']; ?>" style="width:80%;" id="p10_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p11 != 0) { ?>
            <?php for($i =0; $i < $data->p11; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p11_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p11_<?php echo $i;?>_porc"><?php echo $totales['p11_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p11_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p11_' . $i]['porcentaje']; ?>" style="width:80%;" id="p11_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p12 != 0) { ?>
            <?php for($i =0; $i < $data->p12; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p12_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p12_<?php echo $i;?>_porc"><?php echo $totales['p12_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p12_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p12_' . $i]['porcentaje']; ?>" style="width:80%;" id="p12_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
          <?php } ?>
          <?php if($data->p13 != 0) { ?>
            <?php for($i =0; $i < $data->p13; $i++) { ?>
              <th style="padding: 0; border-right: 1px solid #C2C2C2; border-bottom: 1px solid #C2C2C2; <?php if(in_array($totales['p13_' . $i]['porcentaje'],$tMaximos[1]) &&  $pintados <= 9) { echo 'background: #fccac7'; $pintados++;} ?>" class="text-center">
                <div id="p13_<?php echo $i;?>_porc"><?php echo $totales['p13_' . $i]['porcentaje']; ?> %</div>
                <input type="hidden" readonly name="totales[p13_<?php echo $i;?>][porcentaje]" value="<?php echo $totales['p13_' . $i]['porcentaje']; ?>" style="width:80%;" id="p13_<?php echo $i;?>_porc_txt"/>
              </th>
            <?php } ?>
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


  <script>
    function ct($i){
      $nomp=prompt("Nombre de la propuesta: ");

      $("#propuesta").attr("value",$i);
      document.getElementById('encabezado').value=$nomp;

      if ($nomp == null) {
      }else if ($nomp=="") {
      }else{
        $('#cambiot').submit();
      }

    }



    
  </script>
  @endsection
