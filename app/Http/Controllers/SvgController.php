<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Project;
use App\Element;
use App\Network;
use Illuminate\Support\Facades\Storage;

class SvgController extends Controller
{
	public function index($project_id)
	{
		$networks=Network::where('project_id',$project_id)->get();
		$flag=count($networks);
		$projects = Project::where('user_id',auth()->id())->get();
		return view('svg')->with(compact('projects'))->with(compact('project_id'))->with(compact('networks'))->with(compact('flag'));
	}

	public function store(Request $request,$project_id)
	{
		if ($request->file('file') == null) {
			return redirect('/'.$project_id.'/svg/');
		}else{
			request()->file->storeAs('uploads',time().'_'.request()->file->getClientOriginalName());
			$network = new Network();
        	$network->project_id = $project_id;
        	$network->ruta = time().'_'.request()->file->getClientOriginalName();
        	$network->save();
		}
		return redirect('/'.$project_id.'/svg/');
	}

	public function save($project_id, $file)
	{
		return Storage::download("uploads/$file");
	}


	public function delete($project_id)
	{
		$networks = Network::where('project_id',$project_id)->get();
		foreach ($networks as $network) {
			Storage::delete('uploads/'.$network->ruta);
			$network->delete();
		}
		return back();
	}


	public function downloadsvg($project_id)
	{
		$esocials = Element::where('project_id',$project_id)->where('ambit','SOCIAL')->get();
		$dsocials = json_decode($esocials, true);

		$epoliticos = Element::where('project_id',$project_id)->where('ambit','POLITICO')->get();
		$dpoliticos = json_decode($epoliticos, true);

		$eeconomicos = Element::where('project_id',$project_id)->where('ambit','ECONOMICO')->get();
		$deconomicos = json_decode($eeconomicos, true);

		$eleyess = Element::where('project_id',$project_id)->where('ambit','LEYES-INSTITUCIONAL')->get();
		$dleyess = json_decode($eleyess, true);

		$ebiofisicos = Element::where('project_id',$project_id)->where('ambit','BIOFISICO')->get();
		$dbiofisicos = json_decode($ebiofisicos, true);

		$eculturals = Element::where('project_id',$project_id)->where('ambit','CULTURAL')->get();
		$dculturals = json_decode($eculturals, true);

		$esaluds = Element::where('project_id',$project_id)->where('ambit','SALUD')->get();
		$dsaluds = json_decode($esaluds, true);

		$nombre = 'plantilla-proyecto.xml'; // Nombre del archivo final
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=".$nombre.""); //archivo de salida

		echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
		<mxfile host=\"www.draw.io\" modified=\"2019-12-28T17:33:51.492Z\" agent=\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36\" etag=\"GvpjfwbjFRtBL_fDT7WH\" version=\"12.4.7\" type=\"device\">
		<diagram id=\"reRr2usFnLUNLvbdog-d\" name=\"Página-1\">
		<mxGraphModel dx=\"854\" dy=\"436\" grid=\"1\" gridSize=\"10\" guides=\"1\" tooltips=\"1\" connect=\"1\" arrows=\"1\" fold=\"1\" page=\"1\" pageScale=\"1\" pageWidth=\"1169\" pageHeight=\"827\" math=\"0\" shadow=\"0\">
		<root>
		<mxCell id=\"0\"/>
		<mxCell id=\"1\" parent=\"0\"/>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-1\" value=\"\" style=\"rounded=1;whiteSpace=wrap;html=1;connectable=0;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;cloneable=0;deletable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"12\" y=\"20\" width=\"320\" height=\"380\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-7\" value=\"\" style=\"rounded=1;whiteSpace=wrap;html=1;connectable=0;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;cloneable=0;deletable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"361\" y=\"20\" width=\"344\" height=\"380\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-9\" value=\"\" style=\"rounded=1;whiteSpace=wrap;html=1;connectable=0;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;cloneable=0;deletable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"740\" y=\"20\" width=\"420\" height=\"180\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-10\" value=\"\" style=\"rounded=1;whiteSpace=wrap;html=1;connectable=0;allowArrows=0;recursiveResize=0;movable=0;editable=0;resizable=0;rotatable=0;cloneable=0;deletable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"740\" y=\"440\" width=\"420\" height=\"360\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-11\" value=\"\" style=\"rounded=1;whiteSpace=wrap;html=1;connectable=0;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;cloneable=0;deletable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"740\" y=\"223\" width=\"420\" height=\"190\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-14\" value=\"\" style=\"rounded=1;whiteSpace=wrap;html=1;connectable=0;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;cloneable=0;deletable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"10\" y=\"430\" width=\"320\" height=\"370\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-15\" value=\"&lt;p&gt;&lt;font size=&quot;1&quot;&gt;&lt;span style=&quot;font-size: 15px&quot;&gt;SOCIAL&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;\" style=\"rounded=0;whiteSpace=wrap;html=1;rotation=-90;fontStyle=1;connectable=1;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;deletable=0;cloneable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"-20\" y=\"194.5\" width=\"90\" height=\"25\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-16\" value=\"&lt;p&gt;&lt;span style=&quot;font-size: 15px&quot;&gt;&lt;b&gt;ECONÓMICO&lt;/b&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;\" style=\"rounded=0;whiteSpace=wrap;html=1;rotation=-90;connectable=1;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;deletable=0;cloneable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"325\" y=\"188\" width=\"98\" height=\"25\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-17\" value=\"&lt;p&gt;&lt;span style=&quot;font-size: 15px&quot;&gt;&lt;b&gt;CULTURAL&lt;/b&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;\" style=\"rounded=0;whiteSpace=wrap;html=1;rotation=-90;connectable=1;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;deletable=0;cloneable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"704\" y=\"96.5\" width=\"98\" height=\"25\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-18\" value=\"&lt;p&gt;&lt;span style=&quot;font-size: 15px&quot;&gt;&lt;b&gt;SALUD&lt;/b&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;\" style=\"rounded=0;whiteSpace=wrap;html=1;rotation=-90;connectable=1;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;deletable=0;cloneable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"704\" y=\"304.5\" width=\"98\" height=\"25\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-19\" value=\"&lt;p&gt;&lt;span style=&quot;font-size: 15px&quot;&gt;POLÍTICO&lt;/span&gt;&lt;br&gt;&lt;/p&gt;\" style=\"rounded=0;whiteSpace=wrap;html=1;rotation=-90;fontStyle=1;connectable=1;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;deletable=0;cloneable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"-22\" y=\"603\" width=\"90\" height=\"25\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-21\" value=\"\" style=\"rounded=1;whiteSpace=wrap;html=1;connectable=0;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;cloneable=0;deletable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"362\" y=\"422\" width=\"344\" height=\"378\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-20\" value=\"&lt;p&gt;&lt;span style=&quot;font-size: 15px&quot;&gt;LEGAL-INSTITUCIONAL&lt;/span&gt;&lt;br&gt;&lt;/p&gt;\" style=\"rounded=0;whiteSpace=wrap;html=1;rotation=-90;fontStyle=1;connectable=1;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;deletable=0;cloneable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"311\" y=\"589\" width=\"142\" height=\"39\" as=\"geometry\"/>
		</mxCell>
		<mxCell id=\"yuhjtmSJffbr8ho6EpaS-26\" value=\"&lt;p&gt;&lt;span style=&quot;font-size: 15px&quot;&gt;ENTORNO BIOFISÍCO&lt;/span&gt;&lt;br&gt;&lt;/p&gt;\" style=\"rounded=0;whiteSpace=wrap;html=1;rotation=-90;fontStyle=1;connectable=1;allowArrows=0;recursiveResize=0;editable=0;movable=0;resizable=0;rotatable=0;deletable=0;cloneable=0;\" parent=\"1\" vertex=\"1\">
		<mxGeometry x=\"689\" y=\"591\" width=\"142\" height=\"39\" as=\"geometry\"/>
		</mxCell>";

		$psocial=10;
		foreach ($dsocials as $esocial) {
			$long=strlen($esocial['name_e']);
			$ancho=$long*10;
			if ($long<3) {$ancho=20;}
			$idrandom=rand()-rand()+rand();
			$psocial=$psocial+20;
			echo"<mxCell id=\"$idrandom\" value=\"$esocial[name_e]\" style=\"text;html=1;strokeColor=none;fillColor=none;align=center;verticalAlign=middle;whiteSpace=wrap;rounded=0;\" vertex=\"1\" parent=\"1\">
			<mxGeometry x=\"60\" y=\"$psocial\" width=\"$ancho\" height=\"20\" as=\"geometry\"/>
			</mxCell>";
		}

		$ppolitico=420;
		foreach ($dpoliticos as $epolitico) {
			$long=strlen($epolitico['name_e']);
			$ancho=$long*10;
			if ($long<3) {$ancho=20;}
			$idrandom=rand()-rand()+rand();
			$ppolitico=$ppolitico+20;
			echo"<mxCell id=\"$idrandom\" value=\"$epolitico[name_e]\" style=\"text;html=1;strokeColor=none;fillColor=none;align=center;verticalAlign=middle;whiteSpace=wrap;rounded=0;\" vertex=\"1\" parent=\"1\">
			<mxGeometry x=\"60\" y=\"$ppolitico\" width=\"$ancho\" height=\"20\" as=\"geometry\"/>
			</mxCell>";
		}

		$peconomico=10;
		foreach ($deconomicos as $eeconomico) {
			$long=strlen($eeconomico['name_e']);
			$ancho=$long*10;
			if ($long<3) {$ancho=20;}
			$idrandom=rand()-rand()+rand();
			$peconomico=$peconomico+20;
			echo"<mxCell id=\"$idrandom\" value=\"$eeconomico[name_e]\" style=\"text;html=1;strokeColor=none;fillColor=none;align=center;verticalAlign=middle;whiteSpace=wrap;rounded=0;\" vertex=\"1\" parent=\"1\">
			<mxGeometry x=\"410\" y=\"$peconomico\" width=\"$ancho\" height=\"20\" as=\"geometry\"/>
			</mxCell>";
		}

		$pleyes=420;
		foreach ($dleyess as $eleyes) {
			$long=strlen($eleyes['name_e']);
			$ancho=$long*10;
			if ($long<3) {$ancho=20;}
			$idrandom=rand()-rand()+rand();
			$pleyes=$pleyes+20;
			echo"<mxCell id=\"$idrandom\" value=\"$eleyes[name_e]\" style=\"text;html=1;strokeColor=none;fillColor=none;align=center;verticalAlign=middle;whiteSpace=wrap;rounded=0;\" vertex=\"1\" parent=\"1\">
			<mxGeometry x=\"410\" y=\"$pleyes\" width=\"$ancho\" height=\"20\" as=\"geometry\"/>
			</mxCell>";
		}

		$pbiofisico=430;
		foreach ($dbiofisicos as $ebiofisico) {
			$long=strlen($ebiofisico['name_e']);
			$ancho=$long*10;
			if ($long<3) {$ancho=20;}
			$idrandom=rand()-rand()+rand();
			$pbiofisico=$pbiofisico+20;
			echo"<mxCell id=\"$idrandom\" value=\"$ebiofisico[name_e]\" style=\"text;html=1;strokeColor=none;fillColor=none;align=center;verticalAlign=middle;whiteSpace=wrap;rounded=0;\" vertex=\"1\" parent=\"1\">
			<mxGeometry x=\"800\" y=\"$pbiofisico\" width=\"$ancho\" height=\"20\" as=\"geometry\"/>
			</mxCell>"; 
		}

		$pcultural=10;
		$pxc=780;
		$itc=0;
		foreach ($dculturals as $ecultural) {
			$itc=$itc+1;
			if ($itc==9) {$pxc=1000;$pcultural=10;}
			$long=strlen($ecultural['name_e']);
			$ancho=$long*10;
			if ($long<3) {$ancho=20;}
			$idrandom=rand()-rand()+rand();
			$pcultural=$pcultural+20;
			echo"<mxCell id=\"$idrandom\" value=\"$ecultural[name_e]\" style=\"text;html=1;strokeColor=none;fillColor=none;align=center;verticalAlign=middle;whiteSpace=wrap;rounded=0;\" vertex=\"1\" parent=\"1\">
			<mxGeometry x=\"$pxc\" y=\"$pcultural\" width=\"$ancho\" height=\"20\" as=\"geometry\"/>
			</mxCell>"; 
		}

		$psalud=210;
		$pxs=780;
		$its=0;
		foreach ($dsaluds as $esalud) {
			$its=$its+1;
			if ($its==9) {$pxs=1000;$psalud=210;}
			$long=strlen($esalud['name_e']);
			$ancho=$long*10;
			if ($long<3) {$ancho=20;}
			$idrandom=rand()-rand()+rand();
			$psalud=$psalud+20;
			echo"<mxCell id=\"$idrandom\" value=\"$esalud[name_e]\" style=\"text;html=1;strokeColor=none;fillColor=none;align=center;verticalAlign=middle;whiteSpace=wrap;rounded=0;\" vertex=\"1\" parent=\"1\">
			<mxGeometry x=\"$pxs\" y=\"$psalud\" width=\"$ancho\" height=\"20\" as=\"geometry\"/>
			</mxCell>"; 
		}


		echo"</root>
		</mxGraphModel>
		</diagram>
		</mxfile>";
	}

}