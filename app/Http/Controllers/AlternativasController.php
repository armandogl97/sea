<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Characteristic;
use App\Project;
use DB;
use Auth;
use Schema;

class AlternativasController extends Controller {

  public function index($project_id) {

    $proyecto = Project::find($project_id);

    $data = DB::table('report')->get();

      //Validamos si el proyecto cuenta con reporte activo

    $report = DB::table('report')->where('project_id',$project_id)->get();

    if(count($report)) {
        //Tenemos reporte lo presentamos
      return redirect('rpt/' . $report[0]->id);

    } else {
        //No hay reporte lo creamos
      return redirect($project_id . '/alternativas/create');
    }

  }

  public function delete($project_id) {
      //Buscamos el reporte del proyecto
    $rpt = DB::table('report')->where('project_id',$project_id)->get();

    if(count($rpt)) {

          //Eliminamos la tabla de resultados
      Schema::dropIfExists($rpt[0]->tabla);

      DB::table("report")->where('project_id',$project_id)->delete();
      DB::table("report_totales")->where('report_id',$rpt[0]->id)->delete();
      DB::table("grupos")->where('rpt',$rpt[0]->id)->delete();

    }
    return redirect('/'.$project_id.'/alternativas/create');
  }

  public function create($project_id) {
    $rpt = DB::table('report')->where('project_id',$project_id)->get();
    if(count($rpt)) {
      return redirect('rpt/' . $rpt[0]->id);
    }
    $parametros = array();

    $proyecto = Project::find($project_id);

    $grupos = DB::table('laws')->select(array('group'))->where('user_id',Auth::user()->id)->groupBy('group')->get(); 

    foreach($grupos as $value) {


      $childs = DB::table('laws')->select(array('name_law','id'))->where('user_id',Auth::user()->id)
      ->where('group',$value->group)
      ->get();

      foreach($childs as $child) {

        $parametros[$value->group][] = array('nombre' => $child->name_law, 'id' => $child->id);

      }

    }

    return view('parametros',['parametros' => $parametros,'proyecto' => $proyecto]);

  }

  public function rpt(Request $request) {
      //comprobar si existe en report un reporte ya
    $rpt = DB::table('report')->where('project_id',$request->input('project_id'))->get();
    if(count($rpt)) {
      return redirect('rpt/' . $rpt[0]->id);
    }


    $tableName = 'reporte_' . time();

    $camposInsert = "";

      //Insertamos el reporte y obtenemos el id del mismo
    $rpt_id = DB::table('report')->insertGetId([

      'created_at'         => date('Y-m-d'),
      'updated_at'         => null,
      'project_id'        => $request->input('project_id'),
      'politicas'         => (int)$request->input('politicas'),
      'educacion'         => (int)$request->input('educacion'),
      'investigacion'     => (int)$request->input('investigacion'),
      'planeacion'        => (int)$request->input('planeacion'),
      'institucional'     => (int)$request->input('institucional'),
      'salud'             => (int)$request->input('salud'),
      'legislacion'       => (int)$request->input('legislacion'),
      'p1'       => (int)$request->input('p1'),
      'p2'       => (int)$request->input('p2'),
      'p3'       => (int)$request->input('p3'),
      'p4'       => (int)$request->input('p4'),
      'p5'       => (int)$request->input('p5'),
      'p6'       => (int)$request->input('p6'),
      'p7'       => (int)$request->input('p7'),
      'p8'       => (int)$request->input('p8'),
      'p9'       => (int)$request->input('p9'),
      'p10'       => (int)$request->input('p10'),
      'p11'       => (int)$request->input('p11'),
      'p12'       => (int)$request->input('p12'),
      'p13'       => (int)$request->input('p13'),

      'tabla'             => $tableName
    ]);

    $tableCreate = "CREATE TABLE " . $tableName . " (
    id int(11) NOT NULL, report_id int(10) NOT NULL, law_id int(10) NOT NULL,";

    $tableCreateTotales = "CREATE TABLE " . $tableName . "_totales (
    id int(11) NOT NULL, report_id int(10) NOT NULL,";

    for($i=0; $i < (int)$request->input('politicas'); $i++) {

      $tableCreate .= "politicas_" . $i. " varchar(10) NOT NULL DEFAULT '0',";

        //Insetamos la columna en el campo de totales
      DB::table('report_totales')->insert([

        'report_id'    => $rpt_id,

        'columna'       => "politicas_" . $i,
        'n_group'       => "Propuesta 1",

        'suma'          => 0,

        'porcentaje'    => 0,

      ]);

    }

    for($i=0; $i < (int)$request->input('educacion'); $i++) {

      $tableCreate .= "educacion_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";

      DB::table('report_totales')->insert([

        'report_id'    => $rpt_id,

        'columna'       => "educacion_" . $i,
        'n_group'       => "Propuesta 2",

        'suma'          => 0,

        'porcentaje'    => 0,

      ]);

    }

    for($i=0; $i < (int)$request->input('investigacion'); $i++) {

      $tableCreate .= "investigacion_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";

      DB::table('report_totales')->insert([

        'report_id'    => $rpt_id,

        'columna'       => "investigacion_" . $i,
        'n_group'       => "Propuesta 3",

        'suma'          => 0,

        'porcentaje'    => 0,

      ]);

    }

    for($i=0; $i < (int)$request->input('planeacion'); $i++) {

      $tableCreate .= "planeacion_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";

      DB::table('report_totales')->insert([

        'report_id'    => $rpt_id,

        'columna'       => "planeacion_" . $i,
        'n_group'       => "Propuesta 4",

        'suma'          => 0,

        'porcentaje'    => 0,

      ]);

    }

    for($i=0; $i < (int)$request->input('institucional'); $i++) {

      $tableCreate .= "institucional_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";

      DB::table('report_totales')->insert([

        'report_id'    => $rpt_id,

        'columna'       => "institucional_" . $i,
        'n_group'       => "Propuesta 5",

        'suma'          => 0,

        'porcentaje'    => 0,

      ]);


    }

    for($i=0; $i < (int)$request->input('salud'); $i++) {

      $tableCreate .= "salud_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";

      DB::table('report_totales')->insert([

        'report_id'    => $rpt_id,

        'columna'       => "salud_" . $i,
        'n_group'       => "Propuesta 6",

        'suma'          => 0,

        'porcentaje'    => 0,

      ]);


    }

    for($i=0; $i < (int)$request->input('legislacion'); $i++) {

      $tableCreate .= "legislacion_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";

      DB::table('report_totales')->insert([

        'report_id'    => $rpt_id,

        'columna'       => "legislacion_" . $i,
        'n_group'       => "Propuesta 7",

        'suma'          => 0,

        'porcentaje'    => 0,

      ]);


    }

    for($i=0; $i < (int)$request->input('p1'); $i++) {
      $tableCreate .= "p1_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p1_" . $i,
        'n_group'       => "Propuesta 8",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p2'); $i++) {
      $tableCreate .= "p2_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p2_" . $i,
        'n_group'       => "Propuesta 9",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p3'); $i++) {
      $tableCreate .= "p3_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p3_" . $i,
        'n_group'       => "Propuesta 10",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p4'); $i++) {
      $tableCreate .= "p4_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p4_" . $i,
        'n_group'       => "Propuesta 11",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p5'); $i++) {
      $tableCreate .= "p5_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p5_" . $i,
        'n_group'       => "Propuesta 12",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p6'); $i++) {
      $tableCreate .= "p6_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p6_" . $i,
        'n_group'       => "Propuesta 13",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p7'); $i++) {
      $tableCreate .= "p7_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p7_" . $i,
        'n_group'       => "Propuesta 14",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p8'); $i++) {
      $tableCreate .= "p8_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p8_" . $i,
        'n_group'       => "Propuesta 15",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p9'); $i++) {
      $tableCreate .= "p9_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p9_" . $i,
        'n_group'       => "Propuesta 16",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p10'); $i++) {
      $tableCreate .= "p10_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p10_" . $i,
        'n_group'       => "Propuesta 17",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p11'); $i++) {
      $tableCreate .= "p11_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p11_" . $i,
        'n_group'       => "Propuesta 18",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p12'); $i++) {
      $tableCreate .= "p12_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p12_" . $i,
        'n_group'       => "Propuesta 19",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }
    for($i=0; $i < (int)$request->input('p13'); $i++) {
      $tableCreate .= "p13_" . $i. " varchar(10)  NOT NULL DEFAULT '0',";
      DB::table('report_totales')->insert([
        'report_id'    => $rpt_id,
        'columna'       => "p13_" . $i,
        'n_group'       => "Propuesta 20",
        'suma'          => 0,
        'porcentaje'    => 0,
      ]);
    }

    $tableCreate .= " atencion int(10) NOT NULL, porcentaje int(10) NOT NULL DEFAULT '0' ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    DB::statement($tableCreate);

      //Creamos el alter para la tabla id, unico e incrementable
    $i = 1;
      //Creamos los inserts para la tabla dinamica que se acaba de crear
    foreach($request->input('laws_id') as $law) {

      DB::table($tableName)->insert([

        'id'          => $i,

        'report_id'  => $rpt_id,

        'law_id'      => $law,

        'atencion'    => 0

      ]);

      $i++;
    }


    return redirect('rpt/' . $rpt_id);

  }

  public function rptCreate($id) {

      //Obtenemos el detalle del reporte
    $data = DB::table('report')->where('id',$id)->get();

    $dinamica = array();

    if(count($data)) {

        //Tramos los valores maximo
      $valores = DB::table($data[0]->tabla)
      ->select('porcentaje')
      ->where('porcentaje','!=','0')
      ->orderBy('porcentaje','DESC')
      ->limit(10)
      ->get();

      $maximos = array();

      foreach($valores as $max) {
        $maximos[] = $max->porcentaje;
      }

        //Traemos los grupos asignados al reporte
      $grupos = DB::table($data[0]->tabla)->select(array('group'))
      ->join('laws','laws.id', '=', $data[0]->tabla . '.law_id')
      ->groupBy('group')
      ->get();

      foreach($grupos as $grupo) {

        $laws = DB::table($data[0]->tabla)->select(array($data[0]->tabla.'.*','laws.name_law'))
        ->join('laws','laws.id', '=', $data[0]->tabla . '.law_id')
        ->where('group',$grupo->group)
        ->get();

        foreach($laws as $law) {

          $dinamica[$grupo->group][] = $law;

        }

          //Traemos las leyes asignadas al grupo que fueron incluidas en el reporte
      }

        //Traemos los resultados de la tabla totales
      $totales = array();
      $rstTotales = DB::table('report_totales')
      ->where('report_id',$id)
      ->get();

        //Los colocamos en un array de resultados para consultar por indice
      foreach($rstTotales as $value) {

        $totales[$value->columna] = array(

          'suma'          => $value->suma,

          'porcentaje'    => $value->porcentaje

        );

      }

        //Traemos los 10 valores maximos distintos a cero
      $valores = DB::table('report_totales')
      ->select('porcentaje','suma')
      ->where('porcentaje','!=','0')
      ->where('report_id',$id)
      ->orderBy('porcentaje','DESC')
      ->limit(10)
      ->get();


      $tMaximos = array();

      foreach($valores as $vals) {

        $tMaximos[0][] =$vals->suma;
        $tMaximos[1][] =$vals->porcentaje;
      }

      if(!count($tMaximos)) {

        $tMaximos[0]  = array();
        $tMaximos[1]  = array();

      }

      $enc = DB::table('report_totales')
      ->where('report_id', $id)
      ->select('n_group')
      ->distinct()->get();


        //Abrimos la vista

        //$bproject = DB::table('projects')->where('user_id',Auth::user()->id)->first();
      $breporte = DB::table('report')->where('id', $id)->first();
      $bproject = DB::table('projects')->where('id',$breporte->project_id)->first();
      if ($bproject->user_id == Auth::user()->id) {
        return view('rpt',['data' => $data[0],'dinamica' => $dinamica,'maximos' => $maximos,'totales' => $totales,'tMaximos' => $tMaximos])->with(compact('enc'));
      }
      return redirect("/home");

    }


  }

  public function rptPost(Request $request) {

    foreach($request->input('values') as $key => $values) {

      $updateString = "UPDATE " . $request->input('table') . " SET ";
        //Traemos el registro de la bd para edicion
      $record = DB::table($request->input('table'))->where('id',$key)->get();

      if($record) {

        foreach($values as $column => $value) {

          $updateString .= "{$column} = " . (int)$value . ",";

        }

        $updateString = substr($updateString,0,strlen($updateString) -1);


        $updateString .= " WHERE id = " . $key;

        DB::statement($updateString);

      }

    }

      //eliminamos los totales anteriores del reporte

      //Cargamos los totales nuevos
    foreach($request->input('totales') as $key => $values) {
      DB::table('report_totales')
      ->where('columna', $key)
      ->update([
        'report_id'    => $request->input('rpt_id'),

        'columna'      => $key,

        'suma'         => $values['suma'],

        'porcentaje'   => $values['porcentaje'],
      ]);

      

    }

    return redirect('rpt/' . $request->input('rpt_id'));

  }

  public static function traeValores($rpt,$columna,$campo) {

    $result = DB::table('report_totales')
    ->select(array('report_totales.' . $column))
    ->where('report_id',$rpt)
    ->get();
    if(count($result)){

      return $result[0];

    } else {

      return 0;
    }

  }

  public function letra($id,$letra) {
    $breporte = DB::table('report')->where('id', $id)->first();
    $bproject = DB::table('projects')->where('id',$breporte->project_id)->first();
    if ($bproject->user_id == Auth::user()->id) {

      $gs = DB::table('grupos')->where('letra',$letra)->where('rpt',$id)->get();
      return view('grupos')->with(compact('gs'))->with(compact('id'))->with(compact('letra'));
    }else{
      return redirect("/home");
    }
  }

  public function letradd(Request $request) {

    DB::table('grupos')->insert(
      ['rpt' => $request->input('rpt'), 
      'letra' => $request->input('letra'),
      'texto' => $request->input('name_g')
    ]);return back();
  }

  public function letrae($id,$letra,$e) {
    $elemento = DB::table('grupos')->where('id',$e)->get();
    if(count($elemento)) {
      DB::table("grupos")->where('id',$e)->delete();
    }
    return back();
  }

  public function cambiot(Request $request) {
    if ($request->input('propuesta')==1) {
      $col='%politicas%';
    }
    if ($request->input('propuesta')==2) {
      $col='%educacion%';
    }
    if ($request->input('propuesta')==3) {
      $col='%investigacion%';
    }
    if ($request->input('propuesta')==4) {
      $col='%planeacion%';
    }
    if ($request->input('propuesta')==5) {
      $col='%institucional%';
    }
    if ($request->input('propuesta')==6) {
      $col='%salud%';
    }
    if ($request->input('propuesta')==7) {
      $col='%legislacion%';
    }
    if ($request->input('propuesta')==8) {
      $col='%p1%';
    }
    if ($request->input('propuesta')==9) {
      $col='%p2%';
    }
    if ($request->input('propuesta')==10) {
      $col='%p3%';
    }
    if ($request->input('propuesta')==11) {
      $col='%p4%';
    }
    if ($request->input('propuesta')==12) {
      $col='%p5%';
    }
    if ($request->input('propuesta')==13) {
      $col='%p6%';
    }
    if ($request->input('propuesta')==14) {
      $col='%p7%';
    }
    if ($request->input('propuesta')==15) {
      $col='%p8%';
    }
    if ($request->input('propuesta')==16) {
      $col='%p9%';
    }
    if ($request->input('propuesta')==17) {
      $col='%p10%';
    }
    if ($request->input('propuesta')==18) {
      $col='%p11%';
    }
    if ($request->input('propuesta')==19) {
      $col='%p12%';
    }
    if ($request->input('propuesta')==20) {
      $col='%p13%';
    }

    $avalidar=DB::table('report_totales')->where('report_id',$request->input('rpt_id'))->get();
    $remplazo=0;
    foreach ($avalidar as $validado) {
      if ($request->encabezado==$validado->n_group) {
        $remplazo++;
      }
    }
    if ($remplazo <1) {

      $reporte_todos = DB::table('report_totales')->where('report_id',$request->input('rpt_id'))->where('columna', 'like', $col)->get();
      foreach ($reporte_todos as $encontrado) {
        DB::table('report_totales')
        ->where('id', $encontrado->id)
        ->update(['n_group' => $request->encabezado]);
      }
    }
    return back();
  }


}
