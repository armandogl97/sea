<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Characteristic;
use App\Element;

class DiagramController extends Controller
{
	public function index($project_id)
	{
		$name_problem = Project::find($project_id);    
		$characteristics = Characteristic::where('project_id',$project_id)->orderBy('id','asc')->get();
		$num_characteristics = count($characteristics);
		$elements = Element::where('project_id',$project_id)->orderBy('characteristic_id','asc')->get();

		return view('diagram')->with(compact('name_problem'))->with(compact('characteristics'))->with(compact('num_characteristics'))->with(compact('elements'))->with(compact('project_id'));


		
	}
}