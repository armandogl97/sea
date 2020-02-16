<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Characteristic;
use App\Element;

class TableController extends Controller
{
    public function index($project_id)
	{
		$name_problem = Project::find($project_id);    
		$characteristics = Characteristic::where('project_id',$project_id)->orderBy('id','asc')->get();
		$num_characteristics = count($characteristics);
		$esocials=Element::where('project_id',$project_id)->where('ambit','SOCIAL')->orderby('characteristic_id')->get();
		$eeconomicos=Element::where('project_id',$project_id)->where('ambit','ECONOMICO')->orderby('characteristic_id')->get();
		$eculturals=Element::where('project_id',$project_id)->where('ambit','CULTURAL')->orderby('characteristic_id')->get();
		$epoliticos=Element::where('project_id',$project_id)->where('ambit','POLITICO')->orderby('characteristic_id')->get();
		$eleyess=Element::where('project_id',$project_id)->where('ambit','LEYES-INSTITUCIONAL')->orderby('characteristic_id')->get();
		$esaluds=Element::where('project_id',$project_id)->where('ambit','SALUD')->get();
		$ebiofisicos=Element::where('project_id',$project_id)->where('ambit','BIOFISICO')->orderby('characteristic_id')->get();
		$nsocial=Element::where('project_id',$project_id)->where('ambit','SOCIAL')->count();
		$neconomico=Element::where('project_id',$project_id)->where('ambit','ECONOMICO')->count();
		$ncultural=Element::where('project_id',$project_id)->where('ambit','CULTURAL')->count();
		$npolitico=Element::where('project_id',$project_id)->where('ambit','POLITICO')->count();
		$nleyes=Element::where('project_id',$project_id)->where('ambit','LEYES-INSTITUCIONAL')->count();
		$nsalud=Element::where('project_id',$project_id)->where('ambit','SALUD')->count();
		$nbiofisico=Element::where('project_id',$project_id)->where('ambit','BIOFISICO')->count();

		return view('table')->with(compact('name_problem'))->with(compact('characteristics'))->with(compact('num_characteristics'))->with(compact('project_id'))->with(compact('nsocial'))->with(compact('neconomico'))->with(compact('ncultural'))->with(compact('npolitico'))->with(compact('nleyes'))->with(compact('nsalud'))->with(compact('nbiofisico'))->with(compact('esocials'))->with(compact('eeconomicos'))->with(compact('eculturals'))->with(compact('epoliticos'))->with(compact('eleyess'))->with(compact('esaluds'))->with(compact('ebiofisicos'));


		
	}
	public function edit($project_id,$element_id)
    {
        $element = Element::find($element_id);
        return view('formtable')->with(compact('element'))->with(compact('project_id'));//agregar presure.state.impact.response
    }

    public function update(Request $request, $project_id,$element_id)
    {
        $element = Element::find($element_id);
        $element->pressure = $request->input('pressure');
        $element->state = $request->input('state');
        $element->impact = $request->input('impact');
        $element->response = $request->input('response');
        $element->save(); //update

        return redirect('/'.$project_id.'/table');

    }
}
